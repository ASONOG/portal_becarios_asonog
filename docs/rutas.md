# Documentación de Rutas

> Última actualización: abril 2026

---

## Tabla General de Rutas

| Método | URI | Nombre | Controlador / Componente | Descripción |
|--------|-----|--------|--------------------------|-------------|
| GET | `/` | `home` | `Route::view → welcome` | Página de inicio con hero, misión/visión, galería destacada y formulario de contacto |
| GET | `/galeria` | `gallery` | `Route::view → pages.gallery` | Galería pública de fotos con lightbox y filtro por categoría |
| GET | `/programas` | `programs` | `Route::view → pages.programs` | Información sobre los programas de becas de ASONOG |
| GET | `/practicas` | `internships` | `Route::view → pages.practicas` | Información sobre oportunidades de prácticas profesionales |
| GET | `/contacto` | `contact` | `Route::view → pages.contact` | Formulario de contacto (Livewire `ContactForm`) con rate limiting (5/min por IP) |
| GET | `/donar` | `donate` | `Route::view → pages.donate` | Formulario de donación (Livewire `DonationForm`) con integración PayPal |
| POST | `/paypal/create-order` | `paypal.create-order` | `PayPalController@createOrder` | Valida monto/donante/email, crea orden en PayPal y guarda `Donation` con estado `pending` |
| POST | `/paypal/capture-order` | `paypal.capture-order` | `PayPalController@captureOrder` | Captura pago en PayPal, actualiza `Donation` a `completed` y envía email `DonacionInteres` |
| GET | `/dashboard` | `dashboard` | `Closure (redirect)` | Redirige a `/admin/dashboard` o `/becario/dashboard` según el rol del usuario |
| GET | `/becario/dashboard` | `becario.dashboard` | `Becario\Dashboard` | Panel del becario: porcentaje de perfil completo, últimos 5 documentos, conteos por estado |
| GET | `/becario/documentos` | `becario.documents` | `Becario\DocumentUpload` | Lista solicitudes activas, modal de carga (PDF/DOC/JPG, máx 5 MB), valida duplicados y fechas |
| GET | `/admin/dashboard` | `admin.dashboard` | `Admin\Dashboard` | Panel admin: total becarios, total documentos, pendientes, aprobados, últimos 5 becarios y docs |
| GET | `/admin/solicitudes` | `admin.assignments.index` | `Admin\AssignmentManage` | CRUD de solicitudes (título, tipo: informe/documento/otro, descripción, fecha límite). Alternar activa/cerrada |
| GET | `/admin/becarios` | `admin.becarios.index` | `Admin\BecariosList` | Lista paginada (15/pág) de becarios con búsqueda por nombre, email e institución |
| GET | `/admin/becarios/crear` | `admin.becarios.create` | `Admin\BecarioCreate` | Formulario para crear becario (nombre, email), genera contraseña aleatoria y envía invitación por email |
| GET | `/admin/becarios/{user}` | `admin.becarios.show` | `Admin\BecarioShow` | Perfil individual del becario + todos sus documentos con revisión en línea (aprobar/rechazar con notas) |
| GET | `/admin/documentos` | `admin.documents.index` | `Admin\DocumentsReview` | Vista general de solicitudes con conteo de documentos (total y pendientes). Filtro por solicitud |
| GET | `/admin/documentos/{assignment}` | `admin.documents.show` | `Admin\AssignmentDocuments` | Documentos de una solicitud específica. Filtro por estado. Revisión en línea (aprobar/rechazar con notas) |
| GET | `/admin/galeria` | `admin.gallery.index` | `Admin\GalleryManage` | Subir, editar, eliminar fotos. Alternar visibilidad. Máx 24 fotos. Convierte a WebP |
| GET | `/admin/donaciones` | `admin.donations.index` | `Admin\DonationsList` | Registro de donaciones con búsqueda por nombre, email u orden PayPal. Filtro por estado |
| REDIRECT | `/settings` | — | `Redirect → settings/profile` | Redirige automáticamente al perfil del usuario |
| GET | `/settings/profile` | `profile.edit` | `Settings\Profile` | Editar nombre, email, teléfono, identidad, institución, carrera y biografía |
| GET | `/settings/security` | `security.edit` | `Settings\Security` | Cambiar contraseña y configurar autenticación de dos factores (2FA con TOTP) |

---

## Rutas Agrupadas por Sección

### 1. Páginas Públicas

Sin autenticación. Accesibles para cualquier visitante.

| URI | Nombre | Descripción |
|-----|--------|-------------|
| `/` | `home` | Página de inicio |
| `/galeria` | `gallery` | Galería de fotos |
| `/programas` | `programs` | Programas de becas |
| `/practicas` | `internships` | Prácticas profesionales |
| `/contacto` | `contact` | Formulario de contacto |
| `/donar` | `donate` | Formulario de donación |

**Middleware:** ninguno

---

### 2. PayPal (Donaciones)

Endpoints para el flujo de pago con PayPal. Llamados vía JavaScript desde la página `/donar`.

| URI | Nombre | Descripción |
|-----|--------|-------------|
| `POST /paypal/create-order` | `paypal.create-order` | Crear orden de pago |
| `POST /paypal/capture-order` | `paypal.capture-order` | Capturar pago completado |

**Middleware:** `throttle:10,1` (máximo 10 peticiones por minuto)

---

### 3. Redirección Post-Login

| URI | Nombre | Descripción |
|-----|--------|-------------|
| `/dashboard` | `dashboard` | Redirige según rol (`admin` → `/admin/dashboard`, `becario` → `/becario/dashboard`) |

**Middleware:** `auth`, `verified`

---

### 4. Área Becario

Panel privado para usuarios con rol `becario`.

| URI | Nombre | Descripción |
|-----|--------|-------------|
| `/becario/dashboard` | `becario.dashboard` | Panel principal con resumen de actividad |
| `/becario/documentos` | `becario.documents` | Gestión y carga de documentos |

**Middleware:** `auth`, `verified`, `role:becario`

---

### 5. Área Admin

Panel privado para usuarios con rol `admin`.

| URI | Nombre | Descripción |
|-----|--------|-------------|
| `/admin/dashboard` | `admin.dashboard` | Panel con estadísticas generales |
| `/admin/solicitudes` | `admin.assignments.index` | Gestión de solicitudes (CRUD) |
| `/admin/becarios` | `admin.becarios.index` | Lista de becarios |
| `/admin/becarios/crear` | `admin.becarios.create` | Crear nuevo becario |
| `/admin/becarios/{user}` | `admin.becarios.show` | Ver perfil y documentos de un becario |
| `/admin/documentos` | `admin.documents.index` | Vista general de documentos por solicitud |
| `/admin/documentos/{assignment}` | `admin.documents.show` | Documentos de una solicitud específica |
| `/admin/galeria` | `admin.gallery.index` | Gestión de galería de fotos |
| `/admin/donaciones` | `admin.donations.index` | Registro de donaciones |

**Middleware:** `auth`, `verified`, `role:admin`

---

### 6. Configuración de Cuenta

Accesible para cualquier usuario autenticado.

| URI | Nombre | Descripción |
|-----|--------|-------------|
| `/settings` | — | Redirige a `/settings/profile` |
| `/settings/profile` | `profile.edit` | Editar perfil personal |
| `/settings/security` | `security.edit` | Contraseña y 2FA |

**Middleware:** `auth` (perfil), `auth + verified` (seguridad), `password.confirm` condicional para 2FA

---

## Mapa de Navegación

### Flujo del Visitante Público

```
Página de Inicio (/)
├── Programas (/programas)
├── Prácticas (/practicas)
├── Galería (/galeria)
├── Contacto (/contacto)
│   └── [Enviar formulario] → Email a admin
└── Donar (/donar)
    └── [Pagar con PayPal]
        ├── POST /paypal/create-order → Crea orden
        └── POST /paypal/capture-order → Captura pago → Email a admin
```

### Flujo Post-Login

```
Login (Fortify)
└── /dashboard
    ├── [Si es admin]   → /admin/dashboard
    └── [Si es becario] → /becario/dashboard
```

### Flujo del Administrador

```
/admin/dashboard
├── Solicitudes (/admin/solicitudes)
│   └── [Crear/editar/eliminar solicitudes]
│       └── Ver documentos (/admin/documentos/{assignment})
│           └── [Aprobar o rechazar documentos]
│
├── Becarios (/admin/becarios)
│   ├── Crear becario (/admin/becarios/crear)
│   │   └── [Envía email de invitación con enlace de contraseña]
│   └── Ver becario (/admin/becarios/{user})
│       └── [Revisar documentos del becario en línea]
│
├── Documentos (/admin/documentos)
│   └── [Vista general con conteos por solicitud]
│       └── Ver detalle (/admin/documentos/{assignment})
│
├── Galería (/admin/galeria)
│   └── [Subir, editar, eliminar fotos. Máx 24]
│
├── Donaciones (/admin/donaciones)
│   └── [Buscar y filtrar historial de donaciones]
│
└── Configuración
    ├── Perfil (/settings/profile)
    └── Seguridad (/settings/security)
```

### Flujo del Becario

```
/becario/dashboard
├── Documentos (/becario/documentos)
│   └── [Ver solicitudes activas]
│       └── [Subir documento (PDF/DOC/JPG, máx 5 MB)]
│
└── Configuración
    ├── Perfil (/settings/profile)
    └── Seguridad (/settings/security)
```

---

## Notas Técnicas

- **Autenticación:** gestionada por [Laravel Fortify](https://laravel.com/docs/fortify) (login, registro, verificación de email, reseteo de contraseña, 2FA).
- **Vistas estáticas** (`Route::view`): las páginas públicas renderizan Blade templates que pueden incluir componentes Livewire embebidos (`ContactForm`, `DonationForm`).
- **Componentes Livewire** (`Route::livewire`): las rutas del área admin, becario y settings renderizan componentes Livewire de página completa.
- **Controlador tradicional:** solo `PayPalController` maneja peticiones AJAX para el flujo de pago.
- **Middleware `role`:** implementado en `EnsureUserHasRole`, verifica el campo `role` del usuario autenticado.
- **Rate limiting:** aplicado en rutas PayPal (throttle:10,1) y en `ContactForm` (5 intentos/min por IP vía `RateLimiter`).
