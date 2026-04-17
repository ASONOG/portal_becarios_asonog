# Correos Electrónicos

> Última actualización: abril 2026

---

## Proveedor de envío

El sistema utiliza **[Resend](https://resend.com)** como servicio de envío de correos electrónicos.

- **Cuenta dedicada**: Se creó una cuenta de Resend exclusiva para este proyecto (`becas.asonog.hn`) (Solicitar credenciales al encargado).
- **Dominio verificado**: `becas.asonog.hn` — configurado con los registros DNS (SPF, DKIM, DMARC) requeridos por Resend.
- **Remitente**: `no-reply@becas.asonog.hn` con nombre "Becas ASONOG".
- **Paquete**: [`resend/resend-laravel`](https://github.com/resendlabs/resend-laravel) (integración oficial).

### Variables de entorno

| Variable | Descripción |
|---|---|
| `MAIL_MAILER` | Debe ser `resend` |
| `MAIL_FROM_ADDRESS` | Dirección de remitente (ej. `no-reply@becas.asonog.hn`) |
| `MAIL_FROM_NAME` | Nombre del remitente (ej. `Becas ASONOG`) |
| `RESEND_API_KEY` | API key de Resend (empieza con `re_`) |
| `NOTIFICATION_EMAIL` | Correo que recibe todas las notificaciones administrativas |

---

## Correo de notificaciones

Todas las notificaciones administrativas se envían a la dirección definida en `NOTIFICATION_EMAIL`. Esto incluye:

- Mensajes del formulario de contacto
- Confirmaciones de pago PayPal
- Notificaciones de interés de donación
- Confirmaciones de transferencia bancaria

Si `NOTIFICATION_EMAIL` no está definido, se usa `MAIL_FROM_ADDRESS` como fallback.

La configuración se lee desde `config('mail.notification_email')`.

---

## Mailables

| Clase | Vista | Cuándo se envía | Destinatario |
|---|---|---|---|
| `ContactoMensaje` | `emails.contacto-mensaje` | Un visitante envía el formulario de contacto | `NOTIFICATION_EMAIL` |
| `DonacionInteres` | `emails.donacion-interes` | Se completa un pago por PayPal | `NOTIFICATION_EMAIL` |
| `InteresContacto` | `emails.interes-contacto` | Un visitante expresa interés en donar | `NOTIFICATION_EMAIL` |
| `TransferenciaBancaria` | `emails.transferencia-bancaria` | Un visitante confirma una transferencia bancaria | `NOTIFICATION_EMAIL` |
| `BecarioInvitacion` | `emails.becario-invitacion` | Un admin crea un nuevo becario | El correo del becario creado |

Todos los Mailables usan la API estándar de Laravel (`Mailable` con `Envelope`/`Content`/`markdown`) y son compatibles con cualquier driver de correo.

---

## Dónde se disparan los correos

| Archivo | Mailable | Contexto |
|---|---|---|
| `app/Livewire/ContactForm.php` | `ContactoMensaje` | Después de validar el formulario de contacto (rate limit: 5/min por IP) |
| `app/Http/Controllers/PayPalController.php` | `DonacionInteres` | Después de capturar un pago exitoso en PayPal |
| `app/Livewire/DonationPage.php` | `InteresContacto` | Después de registrar un interés de donación |
| `app/Livewire/DonationPage.php` | `TransferenciaBancaria` | Después de registrar una transferencia bancaria con comprobante |
| `app/Livewire/Admin/BecarioCreate.php` | `BecarioInvitacion` | Después de crear un becario y generar su URL de reset de contraseña |

---

## Notas

- Los correos se despachan de forma síncrona. Si se necesita envío asíncrono, los Mailables ya usan el trait `Queueable` y basta con llamar `Mail::queue()` en vez de `Mail::send()`.
- Las vistas de correo están en `resources/views/emails/` y usan componentes Markdown de Laravel.
- Resend reemplazó a SMTP (Mailtrap) en abril 2026.
