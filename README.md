# RND – Registro Nacional de Detenciones (Laravel 12 + Livewire Volt + MySQL)

> Cumple con LNRD y Lineamientos RND para registro inmediato, actualización, consulta pública, certificados y auditoría. **Sin biométricos en esta fase.**

## Requisitos
- PHP 8.3
- Composer 2.x
- Node 18+
- MySQL 8.0+ (utf8mb4)
- Redis (para colas/Horizon)

## Instalación
```bash
composer install
cp .env.example .env
php artisan key:generate
# Configura credenciales MySQL en .env
php artisan migrate --seed
npm install && npm run dev
php artisan horizon & php artisan schedule:work
```

## Features (MVP)

* Registro inmediato (≤5h) con **NRD**
* Actualización (≤2h desde puesta a disposición) y **conclusión 36/48h**
* Ingreso/Egreso y liberación
* Sistema de Consulta (público) y **certificados PDF**
* RBAC (Spatie) + auditoría completa
* Alertas por plazos y cierre automático a 6 días

## Comandos útiles

* `php artisan rdn:remind-deadlines`
* `php artisan rdn:autoclose-stale`
* `php artisan rdn:issue-certificate {nrd|consulta_folio}`

## Desarrollo

* Fechas guardadas en **UTC**, presentadas según `APP_TIMEZONE`.
* Políticas: `DetentionPolicy`, `UpdatePolicy`, `CertificatePolicy`, `AuditPolicy`.
* Endpoints: `/consultas`, `/certificados/{folio}.pdf`.

### Pipeline local sugerido

```bash
# Ventana 1
php artisan serve

# Ventana 2
php artisan horizon

# Ventana 3
php artisan schedule:work
```

## Pruebas

```bash
php artisan test
```

## Seguridad

* Mínima exposición en consulta pública; reglas para delincuencia organizada.
* Cifrado a nivel app para campos sensibles; TDE de MySQL opcional.

## Roadmap

* Ver backlog de issues planificadas para PRs posteriores (Registro inmediato, reglas de plazos, actualización, consulta pública, certificados PDF, etc.).
