<x-mail::message>
# Donación completada

Se ha recibido un pago de donación a través de PayPal.

**Donante:** {{ $data['donor_name'] }}

**Correo:** {{ $data['donor_email'] }}

**Monto:** ${{ number_format((float) $data['amount'], 2) }} {{ $data['currency'] ?? 'USD' }}

**Referencia PayPal:** {{ $data['paypal_order_id'] ?? 'N/A' }}

@if($data['anonymous'])
*El donante desea permanecer anónimo.*
@endif

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
