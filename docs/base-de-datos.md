# Base de Datos

> Última actualización: abril 2026

---

## Tabla Resumen

| Tabla | Descripción | Campos Principales |
|-------|-------------|--------------------|
| `users` | Usuarios del sistema (administradores y becarios) | name, email, role, phone, institution, career |
| `assignments` | Solicitudes de documentos creadas por el admin hacia los becarios | title, type, due_date, status, created_by |
| `documents` | Archivos entregados por los becarios en respuesta a solicitudes | user_id, assignment_id, file_path, status, reviewed_by |
| `donations` | Donaciones recibidas a través de PayPal | paypal_order_id, amount, donor_email, status |
| `bank_transfer_donations` | Donaciones por transferencia bancaria (comprobante adjunto) | donor_name, amount, bank_name, receipt_path, status |
| `interest_donations` | Formularios de interés en donar (pendientes de contacto) | name, email, phone, message, status |
| `internship_applications` | Solicitudes de prácticas profesionales del sitio público | full_name, email, institution, internship_type, status |
| `gallery_photos` | Fotos de la galería pública del sitio | title, category, image_path, size, is_active |
| `password_reset_tokens` | Tokens temporales para restablecer contraseña | email, token |
| `sessions` | Sesiones activas de los usuarios | user_id, ip_address, last_activity |
| `cache` / `cache_locks` | Almacén de caché de la aplicación (infraestructura Laravel) | key, value, expiration |
| `jobs` / `job_batches` / `failed_jobs` | Cola de trabajos asíncronos (infraestructura Laravel) | queue, payload, attempts |

---

## Detalle de Cada Tabla

### `users`

Almacena administradores y becarios. El campo `role` determina qué panel y permisos tiene el usuario. Los campos de perfil (phone, national_id, etc.) aplican solo a becarios.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `name` | string | Nombre completo |
| `email` | string (unique) | Correo electrónico, usado como login |
| `email_verified_at` | timestamp (nullable) | Fecha de verificación de email |
| `password` | string | Contraseña hasheada |
| `remember_token` | string (nullable) | Token para "Recordar sesión" |
| `role` | string (default: `becario`) | Rol del usuario: `admin` o `becario` |
| `phone` | string (nullable) | Teléfono del becario |
| `national_id` | string (nullable) | Número de identidad del becario |
| `institution` | string (nullable) | Institución educativa del becario |
| `career` | string (nullable) | Carrera universitaria del becario |
| `bio` | text (nullable) | Biografía del becario |
| `two_factor_secret` | text (nullable, hidden) | Clave secreta TOTP para 2FA (encriptada) |
| `two_factor_recovery_codes` | text (nullable, hidden) | Códigos de recuperación 2FA (encriptados) |
| `two_factor_confirmed_at` | timestamp (nullable) | Fecha de confirmación de 2FA |

**Modelo:** `App\Models\User`

---

### `assignments`

Solicitudes de documentos que el administrador crea para que todos los becarios entreguen (informes, documentos, etc.). Tienen fecha límite opcional y estado activa/cerrada.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `title` | string | Título de la solicitud (ej. "Informe mensual marzo") |
| `description` | text (nullable) | Instrucciones detalladas para el becario |
| `type` | enum: `informe`, `documento`, `otro` | Categoría del tipo de entrega esperada |
| `due_date` | date (nullable) | Fecha límite de entrega |
| `created_by` | foreignId → `users` | Admin que creó la solicitud (cascade on delete) |
| `status` | enum: `activa`, `cerrada` | Estado actual de la solicitud |

**Modelo:** `App\Models\Assignment`

---

### `documents`

Archivos subidos por los becarios como respuesta a una solicitud. Cada documento pasa por un flujo de revisión: pendiente → aprobado/rechazado.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `user_id` | foreignId → `users` | Becario que subió el documento (cascade on delete) |
| `assignment_id` | foreignId → `assignments` (nullable) | Solicitud a la que responde (null on delete) |
| `title` | string | Título del documento |
| `type` | enum: `informe`, `documento`, `asignacion` | Tipo de documento |
| `description` | text (nullable) | Descripción o notas del becario |
| `file_path` | string | Ruta del archivo en storage |
| `file_name` | string | Nombre original del archivo subido |
| `file_mime_type` | string (nullable) | Tipo MIME (ej. `application/pdf`) |
| `file_size` | unsignedBigInteger (nullable) | Tamaño del archivo en bytes |
| `status` | enum: `pendiente`, `aprobado`, `rechazado` | Estado de revisión del documento |
| `admin_notes` | text (nullable) | Observaciones del admin al revisar |
| `reviewed_by` | foreignId → `users` (nullable) | Admin que revisó (null on delete) |
| `reviewed_at` | timestamp (nullable) | Fecha y hora de la revisión |

**Modelo:** `App\Models\Document`

> **Nota:** El estado `revisado` fue eliminado en la migración `2026_03_21` — los documentos solo pueden estar pendiente, aprobado o rechazado.

---

### `donations`

Donaciones recibidas a través de la integración con PayPal. No están vinculadas a un usuario del sistema ya que cualquier visitante puede donar.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `paypal_order_id` | string (unique) | Identificador de la orden en PayPal |
| `amount` | decimal(10,2) | Monto donado |
| `currency` | string(3) (default: `USD`) | Moneda de la donación |
| `donor_name` | string (nullable) | Nombre del donante (null si es anónimo) |
| `donor_email` | string | Correo electrónico del donante |
| `anonymous` | boolean (default: `false`) | Si el donante eligió permanecer anónimo |
| `status` | string (default: `pending`) | Estado: `pending`, `completed`, `failed` |
| `paid_at` | timestamp (nullable) | Fecha y hora del pago confirmado |

**Modelo:** `App\Models\Donation`

---

### `gallery_photos`

Fotos que se muestran en la galería pública del sitio. Tienen categoría, orden configurable y toggle de visibilidad. Límite máximo: 24 fotos.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `title` | string | Título de la foto |
| `description` | string (nullable) | Descripción breve |
| `category` | string (default: `becarios`) | Categoría: `becarios`, `voluntariados`, `eventos`, `comunidades` |
| `image_path` | string | Ruta de la imagen en storage (formato WebP) |
| `image_name` | string | Nombre original del archivo subido |
| `size` | string (default: `landscape`) | Proporción: `landscape`, `portrait`, `landscape-lg` |
| `sort_order` | unsignedSmallInteger (default: 0) | Orden de presentación en la galería |
| `is_active` | boolean (default: `true`) | Si la foto es visible públicamente |
| `uploaded_by` | foreignId → `users` | Admin que subió la foto (cascade on delete) |

**Modelo:** `App\Models\GalleryPhoto`

---

### `bank_transfer_donations`

Donaciones enviadas mediante transferencia bancaria. El donante sube un comprobante que el admin verifica manualmente. No están vinculadas a usuarios del sistema.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `donor_name` | string | Nombre del donante |
| `amount` | decimal(10,2) | Monto donado |
| `currency` | string(3) (default: `HNL`) | Moneda de la donación |
| `bank_name` | string | Banco desde el que se realizó la transferencia |
| `receipt_path` | string | Ruta del comprobante en storage |
| `receipt_name` | string | Nombre original del archivo del comprobante |
| `status` | string (default: `pendiente`) | Estado: `pendiente`, `verificado`, `rechazado` |

**Modelo:** `App\Models\BankTransferDonation`

---

### `interest_donations`

Formularios de personas que expresan interés en donar pero aún no han realizado ningún pago. El admin las contacta manualmente.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `name` | string | Nombre del interesado |
| `email` | string | Correo electrónico de contacto |
| `phone` | string (nullable) | Teléfono de contacto |
| `message` | text | Mensaje o comentario del interesado |
| `status` | string (default: `pendiente`) | Estado: `pendiente`, `contactado` |

**Modelo:** `App\Models\InterestDonation`

---

### `internship_applications`

Solicitudes de prácticas profesionales enviadas desde el sitio público. Pasan por revisión administrativa antes de ser aceptadas o rechazadas.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `email` | string | Correo electrónico del solicitante |
| `full_name` | string | Nombre completo |
| `phone` | string | Teléfono de contacto |
| `department` | string | Departamento de residencia |
| `municipality` | string | Municipio de residencia |
| `academic_level` | string | Nivel académico (universitario, técnico, etc.) |
| `academic_level_other` | string (nullable) | Especificación si el nivel es "otro" |
| `institution` | string | Institución educativa |
| `field_of_study` | string | Carrera o área de estudio |
| `semester` | string (nullable) | Semestre actual (si aplica) |
| `requires_agreement` | boolean (nullable) | Si requiere convenio institucional |
| `internship_type` | string | Modalidad: presencial, remota, híbrida |
| `availability` | string | Disponibilidad horaria |
| `available_from` | date (nullable) | Fecha a partir de la cual puede iniciar |
| `estimated_duration` | string | Duración estimada de la práctica |
| `motivation` | text | Motivación para hacer prácticas en ASONOG |
| `has_community_experience` | boolean (nullable) | Si tiene experiencia previa en trabajo comunitario |
| `source` | string (nullable) | Cómo se enteró de la convocatoria |
| `source_other` | string (nullable) | Especificación si la fuente es "otra" |
| `cv_path` | string (nullable) | Ruta del CV adjunto en storage |
| `status` | string (default: `pendiente`) | Estado: `pendiente`, `revisada`, `aceptada`, `rechazada` |
| `admin_notes` | text (nullable) | Observaciones del admin |
| `reviewed_by` | foreignId → `users` (nullable) | Admin que revisó la solicitud (null on delete) |
| `reviewed_at` | timestamp (nullable) | Fecha y hora de la revisión |

**Modelo:** `App\Models\InternshipApplication`

---

### `password_reset_tokens`

Tokens temporales generados cuando un usuario solicita restablecer su contraseña. También se usa para la invitación de becarios nuevos.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `email` | string (primary key) | Email del usuario que solicitó el reset |
| `token` | string | Token hasheado de un solo uso |

---

### `sessions`

Sesiones activas del sistema (driver `database`). Permite invalidar sesiones y rastrear dispositivos.

| Campo | Tipo | Propósito |
|-------|------|-----------|
| `id` | string (primary key) | Identificador único de la sesión |
| `user_id` | foreignId → `users` (nullable) | Usuario autenticado (null = invitado) |
| `ip_address` | string(45) (nullable) | Dirección IP del cliente |
| `user_agent` | text (nullable) | Navegador y sistema operativo |
| `payload` | longText | Datos de la sesión serializados |
| `last_activity` | integer (index) | Timestamp UNIX de última actividad |

---

## Relaciones

### User (usuario)

- **Un usuario tiene muchos documentos** — los becarios suben documentos que quedan vinculados a su cuenta (`User → hasMany → Document`)
- **Un usuario ha creado muchas solicitudes** — los administradores crean solicitudes de entrega para los becarios (`User → hasMany → Assignment` vía `created_by`)
- **Un usuario ha revisado muchos documentos** — los admins son referenciados como revisores en los documentos que aprueban o rechazan (`Document.reviewed_by → belongsTo → User`)
- **Un usuario ha subido muchas fotos** — los admins suben fotos a la galería (`GalleryPhoto.uploaded_by → belongsTo → User`)

### Assignment (solicitud)

- **Una solicitud fue creada por un usuario** — siempre un administrador (`Assignment → belongsTo → User` vía `created_by`)
- **Una solicitud tiene muchos documentos** — cada becario puede entregar un documento por solicitud (`Assignment → hasMany → Document`)

### Document (documento)

- **Un documento pertenece a un usuario** — el becario que lo subió (`Document → belongsTo → User` vía `user_id`)
- **Un documento pertenece a una solicitud** — la solicitud que responde, puede ser null si fue un documento libre (`Document → belongsTo → Assignment` vía `assignment_id`)
- **Un documento fue revisado por un usuario** — el admin que lo aprobó o rechazó (`Document → belongsTo → User` vía `reviewed_by`)

### GalleryPhoto (foto de galería)

- **Una foto fue subida por un usuario** — siempre un administrador (`GalleryPhoto → belongsTo → User` vía `uploaded_by`)

### Donation (donación PayPal)

- **Sin relaciones** — las donaciones no están vinculadas a usuarios del sistema (cualquier visitante puede donar)

### BankTransferDonation (donación por transferencia)

- **Sin relaciones** — tabla independiente, el donante no necesita cuenta en el sistema

### InterestDonation (interés en donar)

- **Sin relaciones** — tabla independiente, almacena contactos externos

### InternshipApplication (solicitud de prácticas)

- **Una solicitud fue revisada por un usuario** — el admin que la procesó (`InternshipApplication → belongsTo → User` vía `reviewed_by`)

---

## Diagrama de Relaciones

```
users (1) ──────────── (N) documents               Un usuario (becario) sube muchos documentos
users (1) ──────────── (N) assignments              Un usuario (admin) crea muchas solicitudes
users (1) ──────────── (N) gallery_photos           Un usuario (admin) sube muchas fotos
users (1) ──────────── (N) documents                Un usuario (admin) revisa muchos documentos
                                                    (vía reviewed_by)
users (1) ──────────── (N) internship_applications  Un admin revisa muchas solicitudes de prácticas
                                                    (vía reviewed_by)

assignments (1) ────── (N) documents                Una solicitud recibe muchos documentos
                                                    (uno por becario)

donations                                           Tabla independiente (sin FK a users)
bank_transfer_donations                             Tabla independiente (sin FK a users)
interest_donations                                  Tabla independiente (sin FK a users)
```

### Flujo visual completo

```
┌──────────┐
│  users   │
│ (admin/  │
│ becario) │
└────┬─────┘
     │
     ├─── created_by ──► ┌──────────────┐
     │                   │ assignments  │
     │                   └──────┬───────┘
     │                          │
     │                    assignment_id
     │                          │
     ├─── user_id ────► ┌──────┴───────┐
     │                  │  documents   │
     ├─── reviewed_by ─►│              │
     │                  └──────────────┘
     │
     ├─── uploaded_by ─► ┌───────────────┐
     │                   │ gallery_photos│
     │                   └───────────────┘
     │
     ├─── reviewed_by ─► ┌────────────────────────┐
     │                   │ internship_applications │
     │                   └────────────────────────┘
     │
     │    ┌──────────────┐
     │    │  donations   │  (independiente — PayPal)
     │    └──────────────┘
     │
     │    ┌──────────────────────────┐
     │    │ bank_transfer_donations  │  (independiente)
     │    └──────────────────────────┘
     │
     │    ┌────────────────────┐
     │    │ interest_donations │  (independiente)
     │    └────────────────────┘
     │
     ├──► ┌────────────────────────┐
     │    │ password_reset_tokens  │  (por email)
     │    └────────────────────────┘
     │
     └──► ┌──────────────┐
          │   sessions   │  (por user_id)
          └──────────────┘
```
