<x-mail::message>
# Nuevo interés en donar

Una persona ha expresado interés en realizar una donación y necesita más información.

**Nombre:** {{ $interest->name }}

**Correo:** {{ $interest->email }}

@if($interest->phone)
**Teléfono:** {{ $interest->phone }}
@endif

---

**Mensaje:**

{{ $interest->message }}

---

Ponte en contacto con esta persona para orientarla sobre cómo donar.

<x-mail::button :url="route('admin.donations.index')">
Ver en el panel
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
