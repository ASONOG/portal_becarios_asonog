# Documentación de Componentes Blade

> Última actualización: abril 2026

---

## Índice

1. [Layouts](#1-layouts)
2. [Componentes de UI](#2-componentes-de-ui)
3. [Parciales (Partials)](#3-parciales-partials)
4. [Componentes Livewire — Formularios Públicos](#4-componentes-livewire--formularios-públicos)
5. [Vistas Livewire — Autenticación](#5-vistas-livewire--autenticación)
6. [Vistas Livewire — Panel Admin](#6-vistas-livewire--panel-admin)
7. [Vistas Livewire — Panel Becario](#7-vistas-livewire--panel-becario)
8. [Vistas Livewire — Configuración](#8-vistas-livewire--configuración)
9. [Páginas Públicas](#9-páginas-públicas)
10. [Plantillas de Email](#10-plantillas-de-email)
11. [Overrides de Flux UI](#11-overrides-de-flux-ui)

---

## 1. Layouts

### `layouts/public.blade.php`

| | |
|---|---|
| **Propósito** | Layout base para todas las páginas públicas del sitio (visitantes no autenticados) |
| **Ubicación** | `resources/views/layouts/public.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$title` | string | Opcional | Título de la pestaña del navegador (se concatena con el nombre de la app) |
| `$description` | string | Opcional | Meta description para SEO (default: descripción de ASONOG) |
| `$slot` | slot | Requerido | Contenido principal de la página |

**Dónde se usa:**
- `welcome.blade.php` (inicio)
- `pages/gallery.blade.php`
- `pages/programs.blade.php`
- `pages/practicas.blade.php`
- `pages/contact.blade.php`
- `pages/donate.blade.php`

**Dependencias:**
- `<x-public-navbar />` — barra de navegación
- `<x-public-footer />` — pie de página
- Google Fonts (Inter vía Bunny Fonts)
- Vite (`app.css`, `app.js`)
- Livewire styles/scripts

---

### `layouts/app.blade.php`

| | |
|---|---|
| **Propósito** | Layout wrapper para el panel autenticado; delega a `app/sidebar.blade.php` |
| **Ubicación** | `resources/views/layouts/app.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$title` | string | Opcional | Título de la pestaña |
| `$slot` | slot | Requerido | Contenido principal |

**Dónde se usa:**
- Todas las vistas Livewire de admin (`livewire/admin/*.blade.php`)
- Todas las vistas Livewire de becario (`livewire/becario/*.blade.php`)
- Vistas de configuración (`livewire/settings/*.blade.php`)

**Dependencias:** `layouts/app/sidebar.blade.php`

---

### `layouts/app/sidebar.blade.php`

| | |
|---|---|
| **Propósito** | Layout con sidebar lateral colapsable, navegación contextual por rol (admin/becario) y menú de usuario |
| **Ubicación** | `resources/views/layouts/app/sidebar.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$title` | string | Opcional | Título de la pestaña |
| `$slot` | slot | Requerido | Contenido principal (dentro de `<flux:main>`) |

**Dónde se usa:** Invocado por `layouts/app.blade.php`

**Dependencias:**
- `partials/head.blade.php`
- `<x-desktop-user-menu />`
- Flux UI (`flux:sidebar`, `flux:header`, `flux:menu`, etc.)
- `auth()->user()->isAdmin()` para decidir qué navegación mostrar

---

### `layouts/app/header.blade.php`

| | |
|---|---|
| **Propósito** | Layout alternativo con navegación por header superior (estilo starter kit original, sin uso activo) |
| **Ubicación** | `resources/views/layouts/app/header.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$slot` | slot | Requerido | Contenido principal |

**Dónde se usa:** No se usa actualmente (disponible como alternativa al sidebar)

**Dependencias:**
- `partials/head.blade.php`
- `<x-app-logo />`
- `<x-desktop-user-menu />`
- Flux UI (`flux:header`, `flux:navbar`, `flux:sidebar`)

---

### `layouts/auth.blade.php`

| | |
|---|---|
| **Propósito** | Layout wrapper para páginas de autenticación; delega a `auth/simple.blade.php` |
| **Ubicación** | `resources/views/layouts/auth.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$title` | string | Opcional | Título de la página |
| `$slot` | slot | Requerido | Contenido del formulario |

**Dónde se usa:** Todas las vistas de autenticación (`livewire/auth/*.blade.php`)

**Dependencias:** `layouts/auth/simple.blade.php`

---

### `layouts/auth/simple.blade.php`

| | |
|---|---|
| **Propósito** | Layout de autenticación centrado con tarjeta blanca sobre fondo neutro |
| **Ubicación** | `resources/views/layouts/auth/simple.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$slot` | slot | Requerido | Contenido del formulario de auth |

**Dónde se usa:** Invocado por `layouts/auth.blade.php`

**Dependencias:**
- `partials/head.blade.php`
- `<x-app-logo-icon />`
- Flux Scripts

---

### `layouts/auth/split.blade.php`

| | |
|---|---|
| **Propósito** | Layout de auth con diseño split: panel izquierdo con branding/hero y panel derecho con formulario |
| **Ubicación** | `resources/views/layouts/auth/split.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$slot` | slot | Requerido | Contenido del formulario |

**Dónde se usa:** No se usa actualmente (disponible como alternativa visual)

**Dependencias:**
- `partials/head.blade.php`
- `<x-app-logo-icon />`
- Imagen hero (`img/hero-img.webp`)
- Flux Scripts

---

### `layouts/auth/card.blade.php`

| | |
|---|---|
| **Propósito** | Layout de auth con tarjeta centrada y quote aleatoria (estilo starter kit original) |
| **Ubicación** | `resources/views/layouts/auth/card.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$slot` | slot | Requerido | Contenido del formulario |

**Dónde se usa:** No se usa actualmente (disponible como alternativa visual)

**Dependencias:**
- `partials/head.blade.php`
- `<x-app-logo-icon />`
- `Illuminate\Foundation\Inspiring` (citas aleatorias)
- Flux UI / Scripts

---

## 2. Componentes de UI

### `<x-public-navbar />`

| | |
|---|---|
| **Propósito** | Barra de navegación responsiva (sticky) para el sitio público con menú mobile hamburguesa |
| **Ubicación** | `resources/views/components/public-navbar.blade.php` |

**Props:** Ninguna

**Dónde se usa:** `layouts/public.blade.php`

**Dependencias:**
- Alpine.js (`x-data`, `x-show`, `x-transition`)
- Rutas: `home`, `gallery`, `programs`, `internships`, `donate`, `contact`, `dashboard`, `login`

---

### `<x-public-footer />`

| | |
|---|---|
| **Propósito** | Pie de página del sitio público con columnas de navegación y copyright |
| **Ubicación** | `resources/views/components/public-footer.blade.php` |

**Props:** Ninguna

**Dónde se usa:** `layouts/public.blade.php`

**Dependencias:**
- Rutas: `home`, `gallery`, `programs`, `internships`, `donate`, `contact`, `dashboard`, `login`

---

### `<x-auth-header />`

| | |
|---|---|
| **Propósito** | Encabezado reutilizable para páginas de autenticación (título + descripción) |
| **Ubicación** | `resources/views/components/auth-header.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$title` | string | Requerido | Título principal (h1) |
| `$description` | string | Requerido | Texto descriptivo debajo del título |

**Dónde se usa:**
- `livewire/auth/login.blade.php`
- `livewire/auth/register.blade.php`
- `livewire/auth/forgot-password.blade.php`
- `livewire/auth/reset-password.blade.php`
- `livewire/auth/verify-email.blade.php`
- `livewire/auth/confirm-password.blade.php`
- `livewire/auth/two-factor-challenge.blade.php`

**Dependencias:** Ninguna

---

### `<x-auth-session-status />`

| | |
|---|---|
| **Propósito** | Muestra mensajes de sesión (flash) como confirmaciones o avisos en páginas de auth |
| **Ubicación** | `resources/views/components/auth-session-status.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$status` | string\|null | Requerido | Mensaje de status de la sesión |

**Dónde se usa:**
- `livewire/auth/login.blade.php`
- `livewire/auth/register.blade.php`
- `livewire/auth/forgot-password.blade.php`
- `livewire/auth/reset-password.blade.php`
- `livewire/auth/confirm-password.blade.php`

**Dependencias:** Ninguna

---

### `<x-action-message />`

| | |
|---|---|
| **Propósito** | Mensaje de confirmación temporal (2s) que aparece tras una acción exitosa de Livewire |
| **Ubicación** | `resources/views/components/action-message.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$on` | string | Requerido | Nombre del evento Livewire que dispara la aparición |
| `$slot` | slot | Opcional | Texto del mensaje (default: "Guardado.") |

**Dónde se usa:**
- `livewire/settings/profile.blade.php` (evento `profile-updated`)
- `livewire/settings/security.blade.php` (evento `password-updated`)

**Dependencias:** Alpine.js (`x-data`, `x-init`, `x-show`)

---

### `<x-app-logo />`

| | |
|---|---|
| **Propósito** | Logo de la aplicación con variante sidebar/header (usa Flux brand) |
| **Ubicación** | `resources/views/components/app-logo.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$sidebar` | bool | Opcional | `true` para usar `flux:sidebar.brand`, `false` para `flux:brand` (default: `false`) |

**Dónde se usa:** `layouts/app/header.blade.php`

**Dependencias:**
- `<x-app-logo-icon />`
- Flux UI (`flux:brand`, `flux:sidebar.brand`)

---

### `<x-app-logo-icon />`

| | |
|---|---|
| **Propósito** | Icono SVG del logo de Laravel (usado como favicon visual) |
| **Ubicación** | `resources/views/components/app-logo-icon.blade.php` |

**Props:** Acepta atributos HTML estándar (class, etc.)

**Dónde se usa:**
- `<x-app-logo />`
- `layouts/auth/simple.blade.php`
- `layouts/auth/card.blade.php`
- `layouts/auth/split.blade.php`

**Dependencias:** Ninguna (SVG inline)

---

### `<x-desktop-user-menu />`

| | |
|---|---|
| **Propósito** | Dropdown con perfil del usuario, enlace a configuración y botón de logout |
| **Ubicación** | `resources/views/components/desktop-user-menu.blade.php` |

**Props:** Ninguna (lee `auth()->user()` directamente)

**Dónde se usa:**
- `layouts/app/sidebar.blade.php`
- `layouts/app/header.blade.php`

**Dependencias:**
- Flux UI (`flux:dropdown`, `flux:sidebar.profile`, `flux:menu`, `flux:avatar`)
- `auth()->user()->name`, `auth()->user()->email`, `auth()->user()->initials()`
- Rutas: `profile.edit`, `logout`

---

### `<x-placeholder-pattern />`

| | |
|---|---|
| **Propósito** | Patrón SVG decorativo de líneas diagonales (placeholder visual) |
| **Ubicación** | `resources/views/components/placeholder-pattern.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$id` | string | Opcional | ID único del patrón SVG (default: `uniqid()`) |

**Dónde se usa:** No se usa activamente (componente heredado del starter kit)

**Dependencias:** Ninguna

---

### `<x-settings.layout />`

| | |
|---|---|
| **Propósito** | Layout de dos columnas para páginas de configuración: menú lateral + contenido |
| **Ubicación** | `resources/views/components/settings/layout.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$heading` | string | Opcional | Título de la sección (slot) |
| `$subheading` | string | Opcional | Subtítulo de la sección (slot) |
| `$slot` | slot | Requerido | Contenido del formulario |

**Dónde se usa:**
- `livewire/settings/profile.blade.php`
- `livewire/settings/security.blade.php`

**Dependencias:**
- Flux UI (`flux:navlist`, `flux:heading`, `flux:subheading`, `flux:separator`)
- Rutas: `profile.edit`, `security.edit`

---

## 3. Parciales (Partials)

### `partials/head.blade.php`

| | |
|---|---|
| **Propósito** | Bloque `<head>` compartido: meta tags, fuentes, forzado de modo claro y carga de assets Vite |
| **Ubicación** | `resources/views/partials/head.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$title` | string | Opcional | Título de la pestaña |

**Dónde se usa:**
- `layouts/app/sidebar.blade.php`
- `layouts/app/header.blade.php`
- `layouts/auth/simple.blade.php`
- `layouts/auth/card.blade.php`
- `layouts/auth/split.blade.php`

**Dependencias:**
- Google Fonts (Inter vía Bunny Fonts)
- Vite (`app.css`, `app.js`)
- Script para forzar modo claro en Flux

---

### `partials/settings-heading.blade.php`

| | |
|---|---|
| **Propósito** | Encabezado estándar de la sección de configuración ("Configuración" + subtítulo) |
| **Ubicación** | `resources/views/partials/settings-heading.blade.php` |

**Props:** Ninguna

**Dónde se usa:**
- `livewire/settings/profile.blade.php`
- `livewire/settings/security.blade.php`

**Dependencias:** Flux UI (`flux:heading`, `flux:subheading`, `flux:separator`)

---

## 4. Componentes Livewire — Formularios Públicos

### `<livewire:contact-form />`

| | |
|---|---|
| **Propósito** | Formulario de contacto con validación, rate limiting (5/min por IP) y envío de email |
| **Ubicación** | Clase: `app/Livewire/ContactForm.php` · Vista: `resources/views/livewire/contact-form.blade.php` |

**Props públicas (state):**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$name` | string | Requerido | Nombre del remitente |
| `$last_name` | string | Requerido | Apellido del remitente |
| `$email` | string | Requerido | Correo electrónico |
| `$subject` | string | Requerido | Asunto (select con opciones predefinidas) |
| `$message` | string | Requerido | Cuerpo del mensaje (máx 2000 chars) |
| `$sent` | bool | — | Estado de envío exitoso |

**Dónde se usa:** `pages/contact.blade.php`

**Dependencias:**
- `App\Mail\ContactoMensaje` (Mailable)
- `Illuminate\Support\Facades\RateLimiter`
- `Illuminate\Support\Facades\Mail`

---

### `<livewire:donation-form />`

| | |
|---|---|
| **Propósito** | Formulario de donación con montos preseleccionados, datos del donante e integración PayPal |
| **Ubicación** | Clase: `app/Livewire/DonationForm.php` · Vista: `resources/views/livewire/donation-form.blade.php` |

**Props públicas (state):**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$amount` | string\|null | Requerido | Monto de la donación (min: 1, max: 999999) |
| `$donor_name` | string | Condicional | Nombre del donante (requerido si no es anónimo) |
| `$donor_email` | string | Requerido | Correo del donante |
| `$anonymous` | bool | Opcional | Si la donación es anónima |
| `$paid` | bool | — | Indica si el pago fue completado |

**Dónde se usa:** `pages/donate.blade.php`

**Dependencias:**
- PayPal JS SDK (cargado vía script tag con `client-id` de config)
- Alpine.js (`donationPaypal()` para manejar botones PayPal)
- Rutas `paypal.create-order` y `paypal.capture-order` (AJAX fetch)

---

## 5. Vistas Livewire — Autenticación

### `livewire/auth/login.blade.php`

| | |
|---|---|
| **Propósito** | Formulario de inicio de sesión con email, contraseña y "Recordar sesión" |
| **Ubicación** | `resources/views/livewire/auth/login.blade.php` |

**Dónde se usa:** Ruta de Fortify `login`

**Dependencias:** `<x-layouts::auth>`, `<x-auth-header>`, `<x-auth-session-status>`

---

### `livewire/auth/register.blade.php`

| | |
|---|---|
| **Propósito** | Formulario de registro con nombre, correo, contraseña y confirmación |
| **Ubicación** | `resources/views/livewire/auth/register.blade.php` |

**Dónde se usa:** Ruta de Fortify `register`

**Dependencias:** `<x-layouts::auth>`, `<x-auth-header>`, `<x-auth-session-status>`

---

### `livewire/auth/forgot-password.blade.php`

| | |
|---|---|
| **Propósito** | Formulario para solicitar enlace de restablecimiento de contraseña |
| **Ubicación** | `resources/views/livewire/auth/forgot-password.blade.php` |

**Dónde se usa:** Ruta de Fortify `password.request`

**Dependencias:** `<x-layouts::auth>`, `<x-auth-header>`, `<x-auth-session-status>`

---

### `livewire/auth/reset-password.blade.php`

| | |
|---|---|
| **Propósito** | Formulario para establecer nueva contraseña usando token de reset |
| **Ubicación** | `resources/views/livewire/auth/reset-password.blade.php` |

**Dónde se usa:** Ruta de Fortify `password.reset`

**Dependencias:** `<x-layouts::auth>`, `<x-auth-header>`, `<x-auth-session-status>`

---

### `livewire/auth/verify-email.blade.php`

| | |
|---|---|
| **Propósito** | Pantalla de verificación de email con botón para reenviar enlace |
| **Ubicación** | `resources/views/livewire/auth/verify-email.blade.php` |

**Dónde se usa:** Ruta de Fortify `verification.notice`

**Dependencias:** `<x-layouts::auth>`, `<x-auth-header>`

---

### `livewire/auth/confirm-password.blade.php`

| | |
|---|---|
| **Propósito** | Confirmación de contraseña antes de acceder a áreas protegidas (ej. configurar 2FA) |
| **Ubicación** | `resources/views/livewire/auth/confirm-password.blade.php` |

**Dónde se usa:** Ruta de Fortify `password.confirm`

**Dependencias:** `<x-layouts::auth>`, `<x-auth-header>`, `<x-auth-session-status>`

---

### `livewire/auth/two-factor-challenge.blade.php`

| | |
|---|---|
| **Propósito** | Pantalla de ingreso de código TOTP o código de recuperación para 2FA |
| **Ubicación** | `resources/views/livewire/auth/two-factor-challenge.blade.php` |

**Dónde se usa:** Ruta de Fortify `two-factor.login`

**Dependencias:**
- `<x-layouts::auth>`, `<x-auth-header>`
- Alpine.js (toggle entre OTP y recovery code)
- Flux UI (`flux:otp` para input de 6 dígitos)

---

## 6. Vistas Livewire — Panel Admin

### `livewire/admin/dashboard.blade.php`

| | |
|---|---|
| **Propósito** | Panel de administración: tarjetas de estadísticas, becarios recientes y documentos pendientes |
| **Ubicación** | Clase: `app/Livewire/Admin/Dashboard.php` · Vista: `resources/views/livewire/admin/dashboard.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$totalBecarios` | int | Total de usuarios con rol becario |
| `$totalDocs` | int | Total de documentos en el sistema |
| `$pendientes` | int | Documentos con estado pendiente |
| `$aprobados` | int | Documentos aprobados |
| `$recentBecarios` | Collection | Últimos 5 becarios registrados |
| `$pendingDocs` | Collection | Últimos 5 documentos pendientes |

**Dónde se usa:** Ruta `admin.dashboard`

**Dependencias:** Layout `app` (sidebar)

---

### `livewire/admin/becarios-list.blade.php`

| | |
|---|---|
| **Propósito** | Tabla paginada de becarios con buscador y enlace a perfil individual |
| **Ubicación** | Clase: `app/Livewire/Admin/BecariosList.php` · Vista: `resources/views/livewire/admin/becarios-list.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$search` | string | Texto de búsqueda (URL-bound) |
| `$becarios` | LengthAwarePaginator | Resultados paginados (15/página) |

**Dónde se usa:** Ruta `admin.becarios.index`

**Dependencias:** Layout `app` (sidebar)

---

### `livewire/admin/becario-create.blade.php`

| | |
|---|---|
| **Propósito** | Formulario para crear nuevo becario con envío de email de invitación |
| **Ubicación** | Clase: `app/Livewire/Admin/BecarioCreate.php` · Vista: `resources/views/livewire/admin/becario-create.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$name` | string | Nombre completo del becario |
| `$email` | string | Correo electrónico |

**Dónde se usa:** Ruta `admin.becarios.create`

**Dependencias:**
- Layout `app` (sidebar)
- `App\Mail\BecarioInvitacion` (envío de invitación)

---

### `livewire/admin/becario-show.blade.php`

| | |
|---|---|
| **Propósito** | Perfil individual del becario con datos personales, barra de completitud y lista de documentos con revisión en línea |
| **Ubicación** | Clase: `app/Livewire/Admin/BecarioShow.php` · Vista: `resources/views/livewire/admin/becario-show.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$user` | User | Modelo del becario (route model binding) |
| `$documents` | Collection | Documentos del becario |
| `$reviewDocId` | int\|null | ID del documento en revisión activa |
| `$reviewStatus` | string | Estado seleccionado (aprobado/rechazado) |
| `$adminNotes` | string | Notas del admin para el documento |

**Dónde se usa:** Ruta `admin.becarios.show`

**Dependencias:** Layout `app` (sidebar)

---

### `livewire/admin/assignment-manage.blade.php`

| | |
|---|---|
| **Propósito** | CRUD completo de solicitudes de documentos: crear, editar, cambiar estado y eliminar |
| **Ubicación** | Clase: `app/Livewire/Admin/AssignmentManage.php` · Vista: `resources/views/livewire/admin/assignment-manage.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$title` | string | Título de la solicitud |
| `$type` | string | Tipo: informe, documento, otro |
| `$description` | string | Instrucciones para el becario |
| `$due_date` | string\|null | Fecha límite |
| `$showForm` | bool | Mostrar/ocultar formulario |
| `$editingId` | int\|null | ID de solicitud en edición |
| `$assignments` | Collection | Lista de todas las solicitudes |

**Dónde se usa:** Ruta `admin.assignments.index`

**Dependencias:** Layout `app` (sidebar)

---

### `livewire/admin/documents-review.blade.php`

| | |
|---|---|
| **Propósito** | Vista general de documentos agrupados por solicitud con estadísticas globales y filtro |
| **Ubicación** | Clase: `app/Livewire/Admin/DocumentsReview.php` · Vista: `resources/views/livewire/admin/documents-review.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$assignmentFilter` | string | Filtro por solicitud específica (URL-bound) |
| `$counts` | array | Conteos: total, pendiente, aprobado, rechazado |
| `$assignments` | Collection | Solicitudes con conteo de documentos |
| `$allAssignments` | Collection | Todas las solicitudes (para el select de filtro) |
| `$totalBecarios` | int | Total de becarios (para calcular progreso) |

**Dónde se usa:** Ruta `admin.documents.index`

**Dependencias:** Layout `app` (sidebar)

---

### `livewire/admin/assignment-documents.blade.php`

| | |
|---|---|
| **Propósito** | Lista de entregas de una solicitud específica con revisión en línea (aprobar/rechazar con notas) |
| **Ubicación** | Clase: `app/Livewire/Admin/AssignmentDocuments.php` · Vista: `resources/views/livewire/admin/assignment-documents.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$assignment` | Assignment | Solicitud actual (route model binding) |
| `$statusFilter` | string | Filtro por estado de documentos |
| `$counts` | array | Conteos por estado |
| `$documents` | Collection | Documentos de la solicitud |
| `$reviewDocId` | int\|null | ID del doc en revisión |
| `$reviewStatus` | string | Estado seleccionado |
| `$adminNotes` | string | Notas del admin |

**Dónde se usa:** Ruta `admin.documents.show`

**Dependencias:** Layout `app` (sidebar)

---

### `livewire/admin/gallery-manage.blade.php`

| | |
|---|---|
| **Propósito** | Gestión de galería: subir, editar, eliminar fotos con toggle de visibilidad y barra de capacidad (máx 24) |
| **Ubicación** | Clase: `app/Livewire/Admin/GalleryManage.php` · Vista: `resources/views/livewire/admin/gallery-manage.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$title` | string | Título de la foto |
| `$description` | string | Descripción opcional |
| `$category` | string | Categoría: becarios, voluntariados, eventos, comunidades |
| `$size` | string | Proporción: landscape, portrait, landscape-lg |
| `$photo` | UploadedFile\|null | Archivo de imagen |
| `$showForm` | bool | Mostrar/ocultar formulario |
| `$editingId` | int\|null | ID de foto en edición |

**Dónde se usa:** Ruta `admin.gallery.index`

**Dependencias:**
- Layout `app` (sidebar)
- Livewire `WithFileUploads`
- Intervention Image (conversión a WebP)
- Modelo `GalleryPhoto` (constantes de categorías y límite)

---

### `livewire/admin/donations-list.blade.php`

| | |
|---|---|
| **Propósito** | Tabla de donaciones con estadísticas, buscador y filtro por estado |
| **Ubicación** | Clase: `app/Livewire/Admin/DonationsList.php` · Vista: `resources/views/livewire/admin/donations-list.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$search` | string | Buscar por nombre, correo u orden PayPal (URL-bound) |
| `$status` | string | Filtro por estado: completed, pending, failed (URL-bound) |
| `$donations` | LengthAwarePaginator | Donaciones paginadas |
| `$totalDonaciones` | int | Total de donaciones |
| `$totalCompletadas` | int | Donaciones completadas |
| `$totalPendientes` | int | Donaciones pendientes |
| `$montoTotal` | float | Monto total recaudado |

**Dónde se usa:** Ruta `admin.donations.index`

**Dependencias:** Layout `app` (sidebar)

---

## 7. Vistas Livewire — Panel Becario

### `livewire/becario/dashboard.blade.php`

| | |
|---|---|
| **Propósito** | Panel del becario: resumen con solicitudes activas, entregas por estado, documentos recientes y completitud de perfil |
| **Ubicación** | Clase: `app/Livewire/Becario/Dashboard.php` · Vista: `resources/views/livewire/becario/dashboard.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$activeRequests` | int | Solicitudes activas pendientes de entrega |
| `$pendingCount` | int | Documentos en estado pendiente |
| `$approvedCount` | int | Documentos aprobados |
| `$totalDocs` | int | Total de documentos enviados |
| `$completion` | int | Porcentaje de perfil completado |
| `$docs` | Collection | Últimos 5 documentos del becario |

**Dónde se usa:** Ruta `becario.dashboard`

**Dependencias:** Layout `app` (sidebar)

---

### `livewire/becario/document-upload.blade.php`

| | |
|---|---|
| **Propósito** | Lista de solicitudes activas con modal de carga de archivos, validación de duplicados y fechas vencidas |
| **Ubicación** | Clase: `app/Livewire/Becario/DocumentUpload.php` · Vista: `resources/views/livewire/becario/document-upload.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$assignments` | Collection | Solicitudes activas con documentos del becario |
| `$showUploadModal` | bool | Mostrar/ocultar modal de carga |
| `$selectedAssignmentId` | int\|null | Solicitud seleccionada para subir |
| `$file` | UploadedFile\|null | Archivo a subir (pdf/doc/docx/jpg/jpeg/png, máx 5 MB) |
| `$notes` | string | Notas opcionales del becario |

**Dónde se usa:** Ruta `becario.documents`

**Dependencias:**
- Layout `app` (sidebar)
- Livewire `WithFileUploads`

---

## 8. Vistas Livewire — Configuración

### `livewire/settings/profile.blade.php`

| | |
|---|---|
| **Propósito** | Formulario de edición de perfil: datos básicos (nombre, email) + datos de beca (teléfono, identidad, institución, carrera, bio) para becarios |
| **Ubicación** | Clase: `app/Livewire/Settings/Profile.php` · Vista: `resources/views/livewire/settings/profile.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$name` | string | Nombre completo |
| `$email` | string | Correo electrónico |
| `$phone` | string | Teléfono (solo becarios) |
| `$national_id` | string | Número de identidad (solo becarios) |
| `$institution` | string | Institución educativa (solo becarios) |
| `$career` | string | Carrera (solo becarios) |
| `$bio` | string | Biografía (solo becarios) |

**Dónde se usa:** Ruta `profile.edit`

**Dependencias:**
- `@include('partials.settings-heading')`
- `<x-settings.layout>`
- `<x-action-message>` (confirmación de guardado)

---

### `livewire/settings/security.blade.php`

| | |
|---|---|
| **Propósito** | Cambio de contraseña y gestión de autenticación de dos factores (habilitar/deshabilitar 2FA) |
| **Ubicación** | Clase: `app/Livewire/Settings/Security.php` · Vista: `resources/views/livewire/settings/security.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$current_password` | string | Contraseña actual |
| `$password` | string | Nueva contraseña |
| `$password_confirmation` | string | Confirmación de nueva contraseña |
| `$canManageTwoFactor` | bool | Si el feature 2FA está habilitado |
| `$twoFactorEnabled` | bool | Si el usuario tiene 2FA activo |
| `$qrCodeSvg` | string | SVG del código QR para TOTP |
| `$code` | string | Código de confirmación 2FA |

**Dónde se usa:** Ruta `security.edit`

**Dependencias:**
- `@include('partials.settings-heading')`
- `<x-settings.layout>`
- `<x-action-message>`
- `<livewire:settings.two-factor.recovery-codes />`
- Flux UI (`flux:input`, `flux:button`, `flux:heading`)
- Laravel Fortify (acciones de 2FA)

---

### `livewire/settings/delete-user-form.blade.php`

| | |
|---|---|
| **Propósito** | Sección para eliminar cuenta con modal de confirmación que requiere contraseña |
| **Ubicación** | Vista: `resources/views/livewire/settings/delete-user-form.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$password` | string | Contraseña de confirmación |

**Dónde se usa:** Incluido al final de `livewire/settings/profile.blade.php`

**Dependencias:** Flux UI (`flux:modal`, `flux:button`, `flux:heading`, `flux:input`)

---

### `livewire/settings/two-factor/recovery-codes.blade.php`

| | |
|---|---|
| **Propósito** | Mostrar/ocultar y regenerar códigos de recuperación 2FA del usuario |
| **Ubicación** | Vista: `resources/views/livewire/settings/two-factor/recovery-codes.blade.php` |

**Variables del componente:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$requiresConfirmation` | bool | Si requiere confirmar código primero |
| `$recoveryCodes` | array | Lista de códigos de recuperación |

**Dónde se usa:** `livewire/settings/security.blade.php` (como componente Livewire anidado)

**Dependencias:**
- Alpine.js (toggle visibilidad)
- Flux UI (`flux:button`, `flux:heading`, `flux:icon`)

---

## 9. Páginas Públicas

### `welcome.blade.php`

| | |
|---|---|
| **Propósito** | Página de inicio: hero, stats, sección "Quiénes somos", programas destacados y carrusel de testimonios |
| **Ubicación** | `resources/views/welcome.blade.php` |

**Dónde se usa:** Ruta `home` (`/`)

**Dependencias:**
- Layout `public`
- AOS (Animate On Scroll) vía atributos `data-aos`
- Imágenes: `img/hero-img.webp`, `img/about-us.webp`

---

### `pages/gallery.blade.php`

| | |
|---|---|
| **Propósito** | Galería fotográfica con filtro por categoría, layout masonry y lightbox interactivo |
| **Ubicación** | `resources/views/pages/gallery.blade.php` |

**Dónde se usa:** Ruta `gallery` (`/galeria`)

**Dependencias:**
- Layout `public`
- Alpine.js (`gallery()` para filtros y lightbox)
- Modelo `GalleryPhoto` (consulta directa en el Blade)
- AOS
- Imagen: `img/aboutus-hero.webp`

---

### `pages/programs.blade.php`

| | |
|---|---|
| **Propósito** | Información del programa de becas: objetivo, población meta, tipos de beca e historias de éxito |
| **Ubicación** | `resources/views/pages/programs.blade.php` |

**Dónde se usa:** Ruta `programs` (`/programas`)

**Dependencias:**
- Layout `public`
- AOS
- Imagen: `img/becas-hero.webp`

---

### `pages/practicas.blade.php`

| | |
|---|---|
| **Propósito** | Información sobre prácticas profesionales, pasantías y voluntariados: modalidades, requisitos y formulario de inscripción |
| **Ubicación** | `resources/views/pages/practicas.blade.php` |

**Dónde se usa:** Ruta `internships` (`/practicas`)

**Dependencias:**
- Layout `public`
- AOS
- Imagen: `img/practicas-hero.webp`

---

### `pages/contact.blade.php`

| | |
|---|---|
| **Propósito** | Página de contacto: hero, formulario (componente Livewire), información de contacto y mapa |
| **Ubicación** | `resources/views/pages/contact.blade.php` |

**Dónde se usa:** Ruta `contact` (`/contacto`)

**Dependencias:**
- Layout `public`
- `<livewire:contact-form />`
- AOS
- Imagen: `img/hero-img.webp`

---

### `pages/donate.blade.php`

| | |
|---|---|
| **Propósito** | Página de donación: hero, sección de impacto, formulario de donación con PayPal y FAQ |
| **Ubicación** | `resources/views/pages/donate.blade.php` |

**Dónde se usa:** Ruta `donate` (`/donar`)

**Dependencias:**
- Layout `public`
- `<livewire:donation-form />`
- AOS
- Imagen: `img/donar-hero.webp`

---

## 10. Plantillas de Email

### `emails/becario-invitacion.blade.php`

| | |
|---|---|
| **Propósito** | Email de bienvenida enviado al crear un becario con enlace para establecer contraseña |
| **Ubicación** | `resources/views/emails/becario-invitacion.blade.php` |

**Variables:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$user` | User | Modelo del becario creado |
| `$resetUrl` | string | URL con token para establecer contraseña (expira en 60 min) |

**Dónde se usa:** `App\Mail\BecarioInvitacion` → llamado desde `Admin\BecarioCreate`

**Dependencias:** Componentes Markdown de Laravel (`x-mail::message`, `x-mail::button`)

---

### `emails/contacto-mensaje.blade.php`

| | |
|---|---|
| **Propósito** | Email enviado al admin con los datos del formulario de contacto |
| **Ubicación** | `resources/views/emails/contacto-mensaje.blade.php` |

**Variables:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$data` | array | Contiene `name`, `last_name`, `email`, `subject`, `message` |

**Dónde se usa:** `App\Mail\ContactoMensaje` → llamado desde `ContactForm`

**Dependencias:** Componentes Markdown de Laravel (`x-mail::message`)

---

### `emails/donacion-interes.blade.php`

| | |
|---|---|
| **Propósito** | Email enviado al admin cuando se completa una donación vía PayPal |
| **Ubicación** | `resources/views/emails/donacion-interes.blade.php` |

**Variables:**

| Nombre | Tipo | Descripción |
|--------|------|-------------|
| `$data` | array | Contiene `donor_name`, `donor_email`, `amount`, `currency`, `paypal_order_id`, `anonymous` |

**Dónde se usa:** `App\Mail\DonacionInteres` → llamado desde `PayPalController@captureOrder`

**Dependencias:** Componentes Markdown de Laravel (`x-mail::message`)

---

## 11. Overrides de Flux UI

### `flux/icon/*.blade.php`

| | |
|---|---|
| **Propósito** | Íconos SVG personalizados de Lucide añadidos al sistema de íconos de Flux |
| **Ubicación** | `resources/views/flux/icon/` |

| Archivo | Ícono |
|---------|-------|
| `book-open-text.blade.php` | Libro abierto (documentación) |
| `chevrons-up-down.blade.php` | Flechas arriba/abajo (selector) |
| `folder-git-2.blade.php` | Carpeta git (repositorio) |
| `layout-grid.blade.php` | Cuadrícula (dashboard) |

**Props (todos):**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$variant` | string | Opcional | Variante del ícono: `outline` (default), `mini`, `micro` |

**Dónde se usa:** `layouts/app/header.blade.php` (navbar del layout header alternativo)

**Dependencias:** Clase `Flux::classes()` para tamaños responsive

---

### `flux/navlist/group.blade.php`

| | |
|---|---|
| **Propósito** | Override del componente navlist group de Flux para soportar modo expandable/collapsible |
| **Ubicación** | `resources/views/flux/navlist/group.blade.php` |

**Props:**

| Nombre | Tipo | Requerido | Descripción |
|--------|------|-----------|-------------|
| `$expandable` | bool | Opcional | Habilitar colapso (default: `false`) |
| `$expanded` | bool | Opcional | Estado inicial (default: `true`) |
| `$heading` | string\|null | Opcional | Texto del encabezado del grupo |
| `$slot` | slot | Requerido | Items de navegación del grupo |

**Dónde se usa:** Internamente por Flux cuando se usa `<flux:navlist.group>`

**Dependencias:** Flux UI (`flux:icon.chevron-down`, `flux:icon.chevron-right`), elemento `<ui-disclosure>`
