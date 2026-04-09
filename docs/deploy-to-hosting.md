# Guía de Deploy

> Última actualización: abril 2026

---

## Descripción General

El proyecto cuenta con dos entornos en producción, ambos alojados en el mismo hosting:

| Entorno | Subdominio | Rama Git |
|---------|------------|----------|
| Staging | `stage.becas.asonog.hn` | `develop` |
| Producción | `becas.asonog.hn` | `main` |

El flujo siempre inicia en staging para validar cambios antes de promoverlos a producción.

---

## Flujo Completo de Deploy

### Fase 1 — Desarrollo y subida a GitHub

1. Asegurarse de estar en la rama `develop`:
   ```bash
   git checkout develop
   ```

2. Crear una rama para el nuevo cambio o funcionalidad:
   ```bash
   git checkout -b feat/nombre-del-cambio
   ```

3. Realizar los cambios necesarios y hacer commit.

4. Hacer merge de la rama hacia `develop`:
   ```bash
   git checkout develop
   git merge feat/nombre-del-cambio
   ```

5. Probar la aplicación en local y verificar que todo funcione correctamente.

6. Subir los cambios a GitHub:
   ```bash
   git push origin develop
   ```

---

### Fase 2 — Deploy en Staging

> El subdominio `stage.becas.asonog.hn` está en **modo mantenimiento** por defecto (`php artisan down`). Es necesario habilitarlo antes de probar.

#### 2.1 Habilitar el entorno de staging

Conectarse al servidor vía SSH:

```bash
ssh asonogh@162.246.23.206
```

Ingresar la contraseña del hosting de ASONOG cuando se solicite.

Navegar a la carpeta del subdominio de staging y ejecutar:

```bash
cd public_html/stage.becas.asonog.hn
php artisan up
```

El sitio estará visible en `stage.becas.asonog.hn`.

#### 2.2 Actualizar el código en el hosting

1. Ingresar al panel del hosting.
2. Ir a **Git Version Control**.
3. Buscar el repositorio **`stage_portal_becarios_asonog`** y hacer clic en **Administrar**.
4. Ir a la pestaña **Pull or Deploy**.
5. Desplazarse hacia abajo y hacer clic en **Update from Remote**.

El hosting descargará los últimos cambios de la rama `develop`.

#### 2.3 Verificar en staging

Acceder a `stage.becas.asonog.hn` y realizar las pruebas necesarias.

#### 2.4 Regresar staging a modo mantenimiento

Una vez finalizadas las pruebas, volver a poner el subdominio en modo mantenimiento:

```bash
cd public_html/stage.becas.asonog.hn
php artisan down
```

---

### Fase 3 — Deploy en Producción

> Solo proceder si todo funcionó correctamente en staging.

1. Desde la carpeta local del proyecto, cambiar a la rama `main`:
   ```bash
   git checkout main
   ```

2. Hacer merge con `develop`:
   ```bash
   git merge develop
   ```

3. Subir los cambios a GitHub:
   ```bash
   git push origin main
   ```

4. Ingresar al panel del hosting.
5. Ir a **Git Version Control**.
6. Buscar el repositorio **`prod_portal_becarios_asonog`** y hacer clic en **Administrar**.
7. Ir a la pestaña **Pull or Deploy**.
8. Hacer clic en **Update from Remote**.

El sitio de producción `becas.asonog.hn` quedará actualizado.

---

## Resumen Visual del Flujo

```
rama feature
     │
     ▼ merge
  develop ──► git push ──► staging (stage.becas.asonog.hn)
                                │
                          pruebas OK
                                │
                                ▼ merge
                             main ──► git push ──► producción (becas.asonog.hn)
```

---

## Referencia Rápida — Comandos SSH

| Acción | Comando |
|--------|---------|
| Conectarse al servidor | `ssh asonogh@162.246.23.206` |
| Ir a staging | `cd public_html/stage.becas.asonog.hn` |
| Habilitar sitio | `php artisan up` |
| Poner en mantenimiento | `php artisan down` |
