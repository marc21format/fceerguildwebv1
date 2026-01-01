# Repository-specific Copilot instructions

This Laravel + Livewire starter (Livewire Flux + Volt) app uses Fortify for auth and Vite for assets. The goal of these notes is to give AI coding agents the minimal, actionable context to be productive quickly.

1. Big-picture architecture
- Framework: Laravel (app/), PHP 8.2, Laravel 12. See `composer.json` for versions and packages.
- UI: Livewire + Volt (pages in `resources/views/pages`, Livewire components in `resources/views/livewire`). Volt mounts views in `app/Providers/VoltServiceProvider.php`.
- Auth: Laravel Fortify wired in `app/Providers/FortifyServiceProvider.php` and configured in `config/fortify.php`. Fortify views are replaced by Livewire auth components under `resources/views/livewire/auth` and actions are in `app/Actions/Fortify/` (e.g. `CreateNewUser`, `ResetUserPassword`).
- Routes: `routes/web.php` uses `Volt::route(...)` for settings pages and `Route::view('dashboard', 'dashboard')` behind `auth,verified` middleware.
- Data: Typical Eloquent models under `app/Models/` (notably `app/Models/User.php` — includes Two-Factor, `initials()` helper, and hidden fields for two-factor data).

2. Key workflows / commands
- Local dev (concurrent): `composer run dev` (runs `php artisan serve`, `php artisan queue:listen`, and `npm run dev` via `concurrently`). If this fails, run components individually: `php artisan serve`, `php artisan queue:listen`, and `npm run dev`.
- Build assets: `npm run build` (Vite). See `package.json` scripts.
- Project setup: `composer run setup` performs composer install, environment bootstrap, migrations, `npm install`, and `npm run build`.
- Tests: `composer test` runs `@php artisan test`. Tests use Pest; configuration in `phpunit.xml` uses an in-memory sqlite DB and many env overrides (see `phpunit.xml`).
      
3. Project-specific patterns and conventions
- Volt + Livewire: Add Volt pages with `Volt::route('path', 'view.name')`. Volt mounts two view paths in `VoltServiceProvider::boot()` — `resources/views/livewire` and `resources/views/pages`.
- Fortify integration: Custom Fortify views are set in `FortifyServiceProvider::configureViews()` to Livewire views (e.g. `livewire.auth.login`). Rate limiting is defined in `configureRateLimiting()`.
- Two-factor: Enabled via `config/fortify.php` features. `app/Models/User.php` hides `two_factor_secret` and `two_factor_recovery_codes`.
- Actions: Business logic for auth flows lives in `app/Actions/Fortify/` rather than controllers — prefer updating actions when changing sign-up / reset behavior.

4. Integration points & external deps
- Livewire: `livewire/flux` and `livewire/volt` (see `composer.json`). UI components and routing use Livewire/Volt conventions.
- Fortify: Full auth flows and two-factor authentication.
- Vite + Tailwind: Frontend tooling via `vite` and `tailwindcss` in `package.json`.
- Queue: `php artisan queue:listen` used during dev (concurrently with server and vite).

5. Tests, CI, and environment particulars
- Tests run with sqlite in-memory per `phpunit.xml`. Do not assume a database server in CI unless explicitly configured.
- `composer.json` scripts provide convenient wrappers: `setup`, `dev`, `test`.

6. Quick examples (where to edit)
- Add a settings page: edit `routes/web.php` and add `Volt::route('settings/new', 'settings.new')`, then create `resources/views/pages/settings/new.blade.php` or a Livewire page component.
- Change auth flow: update `app/Actions/Fortify/CreateNewUser.php` or change the Fortify view mapping in `app/Providers/FortifyServiceProvider.php`.
- Add a migration or two-factor fields: see `database/migrations/2025_09_02_075243_add_two_factor_columns_to_users_table.php` and the `User` model.

7. When editing, prefer these files as authoritative
- Routing & page wiring: [routes/web.php](routes/web.php)
- Fortify setup and rate limits: [app/Providers/FortifyServiceProvider.php](app/Providers/FortifyServiceProvider.php)
- Volt mounting (page locations): [app/Providers/VoltServiceProvider.php](app/Providers/VoltServiceProvider.php)
- Auth actions: `app/Actions/Fortify/`
- Model conventions: [app/Models/User.php](app/Models/User.php)
- Build & dev scripts: [composer.json](composer.json) and [package.json](package.json)
- Test config: [phpunit.xml](phpunit.xml)

8. What NOT to change without confirmation
- Migration history and existing column names (changing these can break production data).
- Fortify feature toggles (two-factor, email verification) unless coordinated with frontend Livewire changes.
- The Volt mount paths in `VoltServiceProvider::boot()` — moving them requires updating many page references.

If anything here is unclear or you want a different level of detail (more code examples, an onboarding checklist, or CI-specific notes), tell me which sections to expand and I'll iterate.
