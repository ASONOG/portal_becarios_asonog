<x-mail::message>
# Nuevo mensaje de contacto

Se ha recibido un mensaje desde el formulario de contacto del portal.

**Nombre:** {{ $data['name'] }} {{ $data['last_name'] }}

**Correo:** {{ $data['email'] }}

**Asunto:** {{ $data['subject'] }}

---

**Mensaje:**

{{ $data['message'] }}

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
