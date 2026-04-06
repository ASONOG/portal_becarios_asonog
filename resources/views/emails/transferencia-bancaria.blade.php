<x-mail::message>
# Nueva confirmación de transferencia

Se ha recibido una confirmación de transferencia bancaria desde el portal.

**Donante:** {{ $donation->donor_name }}

**Monto:** L {{ number_format($donation->amount, 2) }}

**Banco de origen:** {{ $donation->bank_name }}

**Comprobante:** {{ $donation->receipt_name }}

**Fecha de envío:** {{ $donation->created_at->format('d/m/Y H:i') }}

---

Esta transferencia está **pendiente de verificación**. Ingresa al panel de administración para revisarla.

<x-mail::button :url="route('admin.donations.index')">
Ver en el panel
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
