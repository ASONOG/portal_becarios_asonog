<?php

namespace Tests\Feature;

use App\Mail\DonacionInteres;
use App\Models\Donation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PayPalTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.paypal.client_id' => 'test-client-id',
            'services.paypal.client_secret' => 'test-client-secret',
            'services.paypal.mode' => 'sandbox',
            'services.paypal.currency' => 'USD',
        ]);
    }

    private function fakePayPalHttp(string $orderId = 'PAYPAL_ORDER_123'): void
    {
        $baseUrl = 'https://api-m.sandbox.paypal.com';

        Http::fake([
            "{$baseUrl}/v1/oauth2/token" => Http::response([
                'access_token' => 'fake-token',
                'token_type' => 'Bearer',
                'expires_in' => 3600,
            ]),
            "{$baseUrl}/v2/checkout/orders" => Http::response([
                'id' => $orderId,
                'status' => 'CREATED',
            ]),
            "{$baseUrl}/v2/checkout/orders/{$orderId}/capture" => Http::response([
                'id' => $orderId,
                'status' => 'COMPLETED',
            ]),
        ]);
    }

    // -------------------------------------------------------
    // CREATE ORDER
    // -------------------------------------------------------

    public function test_create_order_stores_pending_donation(): void
    {
        $this->fakePayPalHttp();

        $response = $this->postJson(route('paypal.create-order'), [
            'amount' => 25,
            'donor_name' => 'Jane Doe',
            'donor_email' => 'jane@example.com',
            'anonymous' => false,
        ]);

        $response->assertOk()->assertJsonStructure(['id']);

        $this->assertDatabaseHas('donations', [
            'paypal_order_id' => 'PAYPAL_ORDER_123',
            'donor_email' => 'jane@example.com',
            'status' => 'pending',
            'amount' => '25.00',
        ]);
    }

    public function test_create_order_validates_required_fields(): void
    {
        $response = $this->postJson(route('paypal.create-order'), []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['amount', 'donor_email']);
    }

    public function test_create_order_validates_minimum_amount(): void
    {
        $response = $this->postJson(route('paypal.create-order'), [
            'amount' => 0.50,
            'donor_email' => 'test@example.com',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['amount']);
    }

    public function test_create_order_returns_502_on_paypal_failure(): void
    {
        Http::fake([
            'https://api-m.sandbox.paypal.com/v1/oauth2/token' => Http::response([
                'access_token' => 'fake-token',
            ]),
            'https://api-m.sandbox.paypal.com/v2/checkout/orders' => Http::response(
                ['error' => 'INTERNAL_SERVER_ERROR'],
                500
            ),
        ]);

        $response = $this->postJson(route('paypal.create-order'), [
            'amount' => 10,
            'donor_name' => 'Error Test',
            'donor_email' => 'err@example.com',
            'anonymous' => false,
        ]);

        $response->assertStatus(502);
        $this->assertDatabaseMissing('donations', ['donor_email' => 'err@example.com']);
    }

    public function test_create_order_anonymous_clears_donor_name(): void
    {
        $this->fakePayPalHttp();

        $this->postJson(route('paypal.create-order'), [
            'amount' => 10,
            'donor_name' => 'Secret Person',
            'donor_email' => 'anon@example.com',
            'anonymous' => true,
        ]);

        $this->assertDatabaseHas('donations', [
            'donor_email' => 'anon@example.com',
            'donor_name' => null,
            'anonymous' => true,
        ]);
    }

    // -------------------------------------------------------
    // CAPTURE ORDER
    // -------------------------------------------------------

    public function test_capture_order_marks_donation_completed(): void
    {
        Mail::fake();

        $orderId = 'CAPTURE_001';
        $this->fakePayPalHttp($orderId);

        Donation::create([
            'paypal_order_id' => $orderId,
            'amount' => 50.00,
            'currency' => 'USD',
            'donor_name' => 'Test Donor',
            'donor_email' => 'donor@example.com',
            'anonymous' => false,
            'status' => 'pending',
        ]);

        $response = $this->postJson(route('paypal.capture-order'), [
            'order_id' => $orderId,
        ]);

        $response->assertOk()->assertJson(['status' => 'completed']);

        $this->assertDatabaseHas('donations', [
            'paypal_order_id' => $orderId,
            'status' => 'completed',
        ]);

        $donation = Donation::where('paypal_order_id', $orderId)->first();
        $this->assertNotNull($donation->paid_at);
    }

    public function test_capture_order_sends_notification_email(): void
    {
        Mail::fake();

        $orderId = 'EMAIL_001';
        $this->fakePayPalHttp($orderId);

        Donation::create([
            'paypal_order_id' => $orderId,
            'amount' => 25.00,
            'currency' => 'USD',
            'donor_name' => 'Email Donor',
            'donor_email' => 'email@example.com',
            'anonymous' => false,
            'status' => 'pending',
        ]);

        $this->postJson(route('paypal.capture-order'), [
            'order_id' => $orderId,
        ]);

        Mail::assertSent(DonacionInteres::class);
    }

    public function test_capture_order_returns_404_for_unknown_order(): void
    {
        $response = $this->postJson(route('paypal.capture-order'), [
            'order_id' => 'NONEXISTENT',
        ]);

        $response->assertNotFound();
    }

    public function test_capture_order_returns_502_on_paypal_failure(): void
    {
        $orderId = 'FAIL_001';

        Http::fake([
            'https://api-m.sandbox.paypal.com/v1/oauth2/token' => Http::response([
                'access_token' => 'fake-token',
            ]),
            "https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderId}/capture" => Http::response(
                ['error' => 'INTERNAL_SERVER_ERROR'],
                500
            ),
        ]);

        Donation::create([
            'paypal_order_id' => $orderId,
            'amount' => 10.00,
            'currency' => 'USD',
            'donor_email' => 'fail@example.com',
            'status' => 'pending',
        ]);

        $response = $this->postJson(route('paypal.capture-order'), [
            'order_id' => $orderId,
        ]);

        $response->assertStatus(502);

        $this->assertDatabaseHas('donations', [
            'paypal_order_id' => $orderId,
            'status' => 'failed',
        ]);
    }

    public function test_capture_validates_order_id(): void
    {
        $response = $this->postJson(route('paypal.capture-order'), []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['order_id']);
    }
}
