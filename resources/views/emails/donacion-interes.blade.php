<x-mail::message>
# Nuevo interés de donación

Se ha recibido una solicitud de donación desde el portal.

**Donante:** {{ $data['donor_name'] }}

**Correo:** {{ $data['donor_email'] }}

**Monto:** L. {{ number_format((float) $data['amount']) }}

**Frecuencia:** {{ $data['frequency'] }}

@if($data['anonymous'])
*El donante desea permanecer anónimo.*
@endif

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
