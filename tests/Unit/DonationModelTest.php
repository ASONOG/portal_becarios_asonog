<?php

namespace Tests\Unit;

use App\Models\Donation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DonationModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_fillable_fields(): void
    {
        $donation = Donation::create([
            'paypal_order_id' => 'TEST123',
            'amount' => 25.00,
            'currency' => 'USD',
            'donor_name' => 'John Doe',
            'donor_email' => 'john@example.com',
            'anonymous' => false,
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('donations', [
            'paypal_order_id' => 'TEST123',
            'donor_email' => 'john@example.com',
            'status' => 'pending',
        ]);
    }

    public function test_amount_cast_to_decimal(): void
    {
        $donation = Donation::create([
            'paypal_order_id' => 'DEC001',
            'amount' => 10,
            'currency' => 'USD',
            'donor_email' => 'test@example.com',
            'status' => 'pending',
        ]);

        $this->assertSame('10.00', $donation->fresh()->amount);
    }

    public function test_anonymous_cast_to_boolean(): void
    {
        $donation = Donation::create([
            'paypal_order_id' => 'BOOL01',
            'amount' => 5.00,
            'currency' => 'USD',
            'donor_email' => 'test@example.com',
            'anonymous' => 1,
            'status' => 'pending',
        ]);

        $this->assertTrue($donation->fresh()->anonymous);
    }

    public function test_paid_at_cast_to_datetime(): void
    {
        $donation = Donation::create([
            'paypal_order_id' => 'DATE01',
            'amount' => 50.00,
            'currency' => 'USD',
            'donor_email' => 'test@example.com',
            'status' => 'completed',
            'paid_at' => '2025-06-01 12:00:00',
        ]);

        $this->assertInstanceOf(\Carbon\CarbonInterface::class, $donation->fresh()->paid_at);
    }

    public function test_scope_completed(): void
    {
        Donation::create([
            'paypal_order_id' => 'COMP01',
            'amount' => 10.00,
            'currency' => 'USD',
            'donor_email' => 'a@example.com',
            'status' => 'completed',
        ]);

        Donation::create([
            'paypal_order_id' => 'PEND01',
            'amount' => 20.00,
            'currency' => 'USD',
            'donor_email' => 'b@example.com',
            'status' => 'pending',
        ]);

        $completed = Donation::completed()->get();

        $this->assertCount(1, $completed);
        $this->assertEquals('COMP01', $completed->first()->paypal_order_id);
    }

    public function test_scope_pending(): void
    {
        Donation::create([
            'paypal_order_id' => 'COMP02',
            'amount' => 10.00,
            'currency' => 'USD',
            'donor_email' => 'a@example.com',
            'status' => 'completed',
        ]);

        Donation::create([
            'paypal_order_id' => 'PEND02',
            'amount' => 20.00,
            'currency' => 'USD',
            'donor_email' => 'b@example.com',
            'status' => 'pending',
        ]);

        $pending = Donation::pending()->get();

        $this->assertCount(1, $pending);
        $this->assertEquals('PEND02', $pending->first()->paypal_order_id);
    }

    public function test_donor_name_is_nullable(): void
    {
        $donation = Donation::create([
            'paypal_order_id' => 'ANON01',
            'amount' => 15.00,
            'currency' => 'USD',
            'donor_name' => null,
            'donor_email' => 'anon@example.com',
            'anonymous' => true,
            'status' => 'pending',
        ]);

        $this->assertNull($donation->fresh()->donor_name);
    }
}
