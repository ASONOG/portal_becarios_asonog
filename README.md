# Portal de Becarios — ASONOG

Portal web de la **Asociación de Organismos No Gubernamentales de Honduras (ASONOG)** para la gestión integral de su programa de becas. Permite a los administradores gestionar becarios, asignar solicitudes de documentos, revisar entregas y administrar una galería fotográfica. Los becarios acceden a su propio panel para subir documentos y dar seguimiento a sus solicitudes. El sitio público presenta la organización, sus programas e integra donaciones vía PayPal.

## Requisitos previos

| Herramienta | Versión mínima |
|---|---|
| PHP | 8.3 |
| Composer | 2.x |
| Node.js | 20.x |
| npm | 10.x |
| SQLite / MySQL / PostgreSQL | cualquiera soportada por Laravel |

Extensiones PHP requeridas: `gd` o `imagick` (para procesamiento de imágenes con Intervention Image), `mbstring`, `xml`, `curl`, `sqlite3` (si se usa SQLite).

## Instalación local

```bash
# 1. Clonar el repositorio
git clone https://github.com/ASONOG/portal_becarios_asonog.git
cd portal_becarios_asonog

# 2. Instalar dependencias PHP
composer install

# 3. Configurar entorno
cp .env.example .env
php artisan key:generate

# 4. Crear base de datos (SQLite por defecto)
touch database/database.sqlite
php artisan migrate

# 5. (Opcional) Sembrar datos de prueba — admin y becario demo
php artisan db:seed

# 6. Crear enlace simbólico de storage
php artisan storage:link

# 7. Instalar dependencias frontend
npm install

# 8. Compilar assets
npm run build
```

### Levantar el entorno de desarrollo

```bash
composer dev
```

Esto ejecuta en paralelo: servidor PHP, cola de trabajos, logs en tiempo real (Pail) y Vite en modo dev.

Alternativamente, puedes levantar cada servicio por separado:

```bash
php artisan serve        # servidor en http://localhost:8000
npm run dev              # Vite en modo watch
php artisan queue:listen # procesar cola de emails
```

### Credenciales del seeder

| Rol | Email | Contraseña |
|---|---|---|
| Admin | `admin@asonog.hn` | `Admin@1234!` |
| Becario | `becario@asonog.hn` | `Becario@1234!` |

> El seeder solo se ejecuta en entorno `local`.

## Variables de entorno

### Aplicación

| Variable | Descripción |
|---|---|
| `APP_NAME` | Nombre de la aplicación (aparece en títulos y emails) |
| `APP_ENV` | Entorno: `local`, `staging`, `production` |
| `APP_KEY` | Clave de encriptación (generada con `key:generate`) |
| `APP_DEBUG` | `true` para ver errores detallados, `false` en producción |
| `APP_URL` | URL base del sitio (ej. `https://portal.asonog.hn`) |
| `APP_LOCALE` | Idioma por defecto (`es`) |

### Base de datos

| Variable | Descripción |
|---|---|
| `DB_CONNECTION` | Driver: `sqlite`, `mysql`, `pgsql` |
| `DB_HOST` | Host del servidor de BD (no aplica para SQLite) |
| `DB_PORT` | Puerto de la BD |
| `DB_DATABASE` | Nombre de la BD o ruta al archivo SQLite |
| `DB_USERNAME` | Usuario de la BD |
| `DB_PASSWORD` | Contraseña de la BD |

### Correo electrónico

| Variable | Descripción |
|---|---|
| `MAIL_MAILER` | Driver de correo: `resend` (por defecto), `smtp`, `ses`, `postmark`, `log` |
| `MAIL_FROM_ADDRESS` | Dirección remitente de los correos salientes |
| `MAIL_FROM_NAME` | Nombre del remitente |
| `RESEND_API_KEY` | API key de Resend (requerida si `MAIL_MAILER=resend`) |
| `NOTIFICATION_EMAIL` | Dirección que recibe los mensajes de contacto y notificaciones de donación |

### PayPal

| Variable | Descripción |
|---|---|
| `PAYPAL_CLIENT_ID` | Client ID de la app PayPal |
| `PAYPAL_CLIENT_SECRET` | Secret de la app PayPal |
| `PAYPAL_MODE` | `sandbox` para pruebas, `live` para producción |
| `PAYPAL_CURRENCY` | Moneda de las donaciones (por defecto `USD`) |

### Otros

| Variable | Descripción |
|---|---|
| `SESSION_DRIVER` | Driver de sesión (`database`, `file`, `redis`) |
| `QUEUE_CONNECTION` | Driver de cola (`database`, `redis`, `sync`) |
| `CACHE_STORE` | Driver de caché (`database`, `file`, `redis`) |
| `FILESYSTEM_DISK` | Disco de almacenamiento por defecto |

## Comandos útiles

```bash
# Desarrollo
composer dev                  # Levanta servidor + queue + pail + vite en paralelo

# Tests
php artisan test              # Ejecutar todos los tests
composer test                 # Lint check + tests

# Linting
composer lint                 # Formatear código con Pint
composer lint:check           # Verificar formato sin modificar

# Base de datos
php artisan migrate           # Ejecutar migraciones pendientes
php artisan migrate:fresh --seed  # Recrear BD desde cero con datos de prueba

# Caché
php artisan config:clear      # Limpiar caché de configuración
php artisan cache:clear       # Limpiar caché general
php artisan view:clear        # Limpiar vistas compiladas

# Storage
php artisan storage:link      # Crear enlace simbólico public/storage → storage/app/public

# Assets
npm run build                 # Compilar para producción
npm run dev                   # Vite en modo watch
```

## Estructura de carpetas relevante

```
app/
├── Concerns/                 # Traits reutilizables (PasswordValidationRules, ProfileValidationRules)
├── Http/
│   ├── Controllers/          # PayPalController (único controller, el resto es Livewire)
│   └── Middleware/            # EnsureUserHasRole — middleware de autorización por rol
├── Livewire/
│   ├── Actions/              # Logout
│   ├── Admin/                # Componentes del panel admin (11)
│   │   ├── Dashboard.php
│   │   ├── BecariosList.php, BecarioCreate.php, BecarioShow.php
│   │   ├── AssignmentManage.php, AssignmentDocuments.php
│   │   ├── DocumentsReview.php
│   │   ├── GalleryManage.php
│   │   ├── DonationsList.php
│   │   └── InternshipApplicationsList.php, InternshipApplicationShow.php
│   ├── Becario/              # Componentes del panel becario (2)
│   │   ├── Dashboard.php
│   │   └── DocumentUpload.php
│   ├── Settings/             # Perfil, seguridad y 2FA
│   ├── ContactForm.php       # Formulario de contacto público
│   ├── DonationForm.php      # Formulario de donación público
│   ├── DonationPage.php      # Página de donación (PayPal + transferencia)
│   └── InternshipForm.php    # Formulario de solicitud de prácticas
├── Mail/                     # Mailables: BecarioInvitacion, ContactoMensaje, DonacionInteres,
│                             #            InteresContacto, SolicitudPractica, TransferenciaBancaria
├── Models/                   # User, Assignment, Document, Donation, GalleryPhoto,
│                             # InternshipApplication, BankTransferDonation, InterestDonation
└── Services/                 # PayPalService — integración con API de PayPal

resources/views/
├── components/               # Componentes Blade reutilizables (navbar, footer, logos)
├── layouts/
│   ├── app/                  # Parciales del layout autenticado
│   ├── app.blade.php         # Layout del panel autenticado (sidebar con Flux UI)
│   ├── auth/                 # Parciales del layout de autenticación
│   ├── auth.blade.php        # Layout de autenticación
│   └── public.blade.php      # Layout del sitio público
├── livewire/
│   ├── admin/                # Vistas de componentes Livewire del admin
│   ├── becario/              # Vistas de componentes Livewire del becario
│   ├── auth/                 # Vistas de login, registro, 2FA, reset password
│   ├── settings/             # Vistas de configuración de cuenta
│   ├── donation-page.blade.php
│   └── internship-form.blade.php
├── pages/                    # Páginas públicas estáticas (galería, programas, prácticas, contacto, donar)
├── partials/                 # Parciales globales (head, settings-heading)
├── emails/                   # Plantillas de correo electrónico
└── welcome.blade.php         # Página de inicio

routes/
├── web.php                   # Rutas públicas, PayPal, becario y admin
└── settings.php              # Rutas de perfil y seguridad

docs/                         # Documentación interna del proyecto

tests/
├── Feature/                  # Tests de integración (PayPal, CRUD admin, documentos, galería, contacto, auth)
└── Unit/                     # Tests unitarios (modelos, donaciones)
```

## Stack tecnológico

- **Backend:** Laravel 12, Livewire 4, Fortify (autenticación + 2FA)
- **Frontend:** Tailwind CSS v4, Flux UI, Alpine.js, AOS (animaciones)
- **Build:** Vite 7
- **Pagos:** PayPal REST API
- **Imágenes:** Intervention Image (conversión a WebP)
- **Tests:** PHPUnit 11
- **Linting:** Laravel Pint

## Licencia

MIT
