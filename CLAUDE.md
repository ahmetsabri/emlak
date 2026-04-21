# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**Emlak** is a Laravel 11 + Filament 3 real estate management system ("emlak" means real estate in Turkish). It is a multi-language, multi-currency admin panel for managing property listings, customers, and related entities.

## Commands

```bash
# Start all dev services concurrently (server + queue + log viewer + Vite)
composer dev

# Build frontend assets for production
npm run build

# Run tests
php artisan test
./vendor/bin/phpunit --filter TestName   # single test

# Lint/format PHP code
composer lint
# or
./vendor/bin/pint

# Clear caches after config/route changes
php artisan optimize:clear

# Run migrations
php artisan migrate
```

## Architecture

### Admin Panel (Primary Interface)

The entire UI lives at `/admin` and is built with **Filament 3**. All CRUD operations, dashboards, and business logic are implemented as Filament Resources, Pages, and Widgets — not traditional Laravel controllers.

- `app/Filament/Resources/` — One resource per domain entity (forms + tables defined here)
- `app/Filament/Widgets/` — Dashboard stats (`RealEstateOverview`, `CustomerOverview`, `StatsOverview`)
- `app/Filament/Pages/` — Custom admin pages
- `app/Providers/Filament/AdminPanelProvider.php` — Panel registration, plugins, middleware

### Domain Models

Core entities in `app/Models/`:

- **RealEstate** — Property listings (central entity); has media, belongs to Category + geographic entities, has many Features via `FeatureRealEstate` pivot
- **Category** — Hierarchical (recursive adjacency list via `staudenmeir/laravel-adjacency-list`); uses `HasCategoryTree` trait
- **Feature / Group** — Property features grouped by category; many-to-many with Category
- **Customer** — CRM contacts
- **Province → County → District** — Geographic hierarchy for location
- **ExchangeRate** — Multi-currency conversion (TRY, USD, EUR, GBP)
- **Language** — Drives translatable field locales

### Key Packages & Patterns

| Concern | Package |
|---|---|
| Translatable fields | `spatie/laravel-translatable` + `solution-forest/filament-translate-field` |
| File/image uploads | `spatie/laravel-media-library` |
| Roles & permissions | `spatie/laravel-permission` |
| Hierarchical categories | `staudenmeir/laravel-adjacency-list` |
| Tree-style select UI | `codewithdennis/filament-select-tree` |
| Map location picker | `dotswan/filament-map-picker` |
| Money/currency fields | `pelmered/filament-money-field` |
| Excel export | `pxlrbt/filament-excel` |

### Authorization

Role-based access is handled by Spatie Permissions. The `HasSuperAdmin` and `HasRoles` traits are on `User`. Policies in `app/Policies/` gate each model. Super admins bypass all policies.

### Translations

Database-backed multi-language support. Translatable model fields are stored as JSON columns. The admin panel renders a tab per language for each translatable field. Adding a new locale requires adding a `Language` record and may require updating translatable field configurations in the relevant Filament resource.

### Frontend

There is a minimal public-facing frontend (Blade views at `resources/views/`). The main application surface is the Filament admin panel. Tailwind CSS with a custom Filament theme; built via Vite.
