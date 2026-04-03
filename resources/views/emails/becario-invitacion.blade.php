<x-mail::message>
# Bienvenido al Portal ASONOG

Hola **{{ $user->name }}**,

Se ha creado una cuenta para ti en el Portal de Becarios de ASONOG.

Para acceder por primera vez, necesitas establecer tu contraseña haciendo clic en el siguiente botón:

<x-mail::button :url="$resetUrl">
Establecer mi contraseña
</x-mail::button>

Este enlace expirará en 60 minutos. Si no configuraste tu acceso a tiempo, puedes solicitar un nuevo enlace desde la página de inicio de sesión usando la opción "¿Olvidaste tu contraseña?".

**Tu correo de acceso:** {{ $user->email }}

Si tienes alguna duda, escríbenos a [talentohumano@asonog.hn](mailto:talentohumano@asonog.hn).

Saludos,<br>
{{ config('app.name') }}
</x-mail::message>
