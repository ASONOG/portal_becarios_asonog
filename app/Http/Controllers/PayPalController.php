<?php

namespace App\Http\Controllers;

use App\Mail\DonacionInteres;
use App\Models\Donation;
use App\Services\PayPalService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PayPalController extends Controller
{
    public function __construct(
        private readonly PayPalService $paypal,
    ) {}

    public function createOrder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:1', 'max:999999'],
            'donor_name' => ['nullable', 'string', 'max:150'],
            'donor_email' => ['required', 'email', 'max:150'],
            'anonymous' => ['boolean'],
        ]);

        $currency = config('services.paypal.currency', 'USD');

        try {
            $order = $this->paypal->createOrder((float) $validated['amount'], $currency);
        } catch (\Throwable $e) {
            Log::error('PayPal createOrder failed', ['error' => $e->getMessage()]);

            return response()->json(['error' => 'No se pudo crear la orden de pago.'], 502);
        }

        Donation::create([
            'paypal_order_id' => $order['id'],
            'amount' => $validated['amount'],
            'currency' => $currency,
            'donor_name' => ($validated['anonymous'] ?? false) ? null : ($validated['donor_name'] ?? null),
            'donor_email' => $validated['donor_email'],
            'anonymous' => $validated['anonymous'] ?? false,
            'status' => 'pending',
        ]);

        return response()->json(['id' => $order['id']]);
    }

    public function captureOrder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'order_id' => ['required', 'string', 'max:50'],
        ]);

        $donation = Donation::where('paypal_order_id', $validated['order_id'])
            ->where('status', 'pending')
            ->first();

        if (! $donation) {
            return response()->json(['error' => 'Orden no encontrada.'], 404);
        }

        try {
            $capture = $this->paypal->captureOrder($validated['order_id']);
        } catch (\Throwable $e) {
            Log::error('PayPal captureOrder failed', [
                'order_id' => $validated['order_id'],
                'error' => $e->getMessage(),
            ]);

            $donation->update(['status' => 'failed']);

            return response()->json(['error' => 'No se pudo procesar el pago.'], 502);
        }

        $status = $capture['status'] ?? 'UNKNOWN';

        if ($status === 'COMPLETED') {
            $donation->update([
                'status' => 'completed',
                'paid_at' => now(),
            ]);

            Mail::to(config('mail.from.address'))->send(new DonacionInteres([
                'donor_name' => $donation->anonymous ? 'Anónimo' : $donation->donor_name,
                'donor_email' => $donation->donor_email,
                'amount' => $donation->amount,
                'currency' => $donation->currency,
                'paypal_order_id' => $donation->paypal_order_id,
                'anonymous' => $donation->anonymous,
            ]));

            return response()->json(['status' => 'completed']);
        }

        $donation->update(['status' => 'failed']);

        return response()->json(['error' => 'El pago no fue completado.'], 422);
    }
}
