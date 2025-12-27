ReferenceCrud — Implementation & Usage

Purpose

This document summarizes the `ReferenceCrud` Livewire component and the related changes made in the repository. It explains how to reuse the component across reference (lookup) tables, how search works, and describes UI behaviors (confirmations, change summary, delete confirmation).

Files added / updated

- `app/Http/Livewire/ReferenceCrud.php`
  - Reusable Livewire component that implements index, create, edit, delete for small reference tables.
  - Features:
    - Configurable `fields` array to drive forms and searchable columns.
    - Case-insensitive SQL `LIKE` search across configured searchable fields.
    - Confirmation modal showing previous vs new values before persisting changes.
    - Delete confirmation modal.
    - Pagination handling (`resetPage()` when search or page size changes).
- `resources/views/livewire/reference/crud.blade.php`
  - Livewire view for the `ReferenceCrud` component (table, modals, search input, actions).
  - A small client-side fallback row-filter was added to make the UI responsive when server-side search isn't available, but primary search uses Livewire/server-side SQL queries.
- `resources/views/livewire/reference/_form-fields.blade.php`
  - Shared partial used by the component to render input fields based on `fields` configuration.
- `resources/views/pages/admin/provinces.blade.php`
  - Example page mounting `ReferenceCrud` for the `Province` model with a `fields` array and wiring.
- `database/seeders/ProvinceSeeder.php`
  - Seeder used during development to populate provinces for the example page (was already run locally).
- `docs/reference-crud.md` (brief usage doc)
  - Short doc with basic usage example (added earlier).
- `docs/reference-crud-implementation.md` (this file)
  - Full summary and implementation notes (this file).

How `ReferenceCrud` is configured (fields array)

- The component expects a `$fields` array of field definitions passed from the Blade page. Each field entry supports:
  - `key` (string): model attribute name
  - `label` (string): friendly label used in forms and in the changes modal
  - `type` (string): one of `text`, `string`, `number`, `date`, `boolean`, etc. (drives rendering and default searchable behavior)
  - `rules` (string): validation rules (applied to `state.<key>`)
  - `default` (mixed): default value when creating new records
  - `searchable` (bool): whether this field should be part of server-side search (if omitted, text/string types are searchable)

Example fields config (Blade page)

@php
$fields = [
    ['key' => 'name', 'label' => 'Name', 'type' => 'text', 'rules' => 'required|string|max:255', 'searchable' => true],
];
@endphp

<livewire:reference-crud :model-class="App\\Models\\Province::class" :fields="$fields" />

Search behavior

- Server-side, case-insensitive `LIKE` is used:
  - The component generates SQL like `LOWER(COALESCE(table.column, '')) LIKE ?` for each searchable field and ORs them.
  - This is safe across common databases (MySQL, Postgres, SQLite).
- We removed the PHP fuzzy fallback to keep behavior simple and predictable. If you need fuzzy/full-text search for larger datasets, consider integrating Laravel Scout + Meilisearch or Algolia.

Save flow and confirmation

- When the user clicks Save in the modal, the component:
  1. Validates input according to `rules`.
  2. Computes the per-field `changes` (previous vs new values) using the `originalData` captured on `edit()`.
  3. Shows a confirmation modal listing changed fields (`Cancel` or `Confirm Save`).
  4. Only after the user clicks `Confirm Save` are changes persisted to the database.

Delete flow

- `confirmDelete()` opens a delete confirmation modal.
- `performDelete()` performs the deletion after confirmation and calls `resetPage()`.

Client-side fallback

- A small JS snippet was added to the component view that attaches to the search input and hides/shows table rows as you type. This is a progressive enhancement and intended as a UX fallback in case Livewire requests are delayed or not available.
- Note: This is not a substitute for server-side filtering on large datasets.

How to reuse across tables (recommended pattern)

1. Create a Blade page for the table (e.g. `resources/views/pages/admin/positions.blade.php`).
2. Define the `$fields` array on the page with the desired `key`, `label`, `type`, and `rules`.
3. Mount the Livewire component: `<livewire:reference-crud :model-class="App\\Models\\Position::class" :fields="$fields" />`.
4. If you have many reference tables, centralize field definitions in a single PHP file (e.g. `config/reference-fields.php`) and import the array into pages to avoid duplication.

Suggested next steps

- Centralize `fields` definitions into `config/reference-fields.php` and update pages to load from there so adding a new reference page is a single-line include.
- Add feature tests around `ReferenceCrud` pages (create, edit, delete, search) to prevent regressions.
- For large datasets, integrate Laravel Scout with a search engine (Meilisearch, Algolia) for efficient fuzzy/full-text search.

Activity logging (Spatie)

We added optional integration points so that when `spatie/laravel-activitylog` is installed, `ReferenceCrud` will log create/update operations and surface recent activity in the details modal.

To enable:

1. Install the package:

```
composer require spatie/laravel-activitylog
```

2. Publish the migration and config, then run migrations:

```
php artisan vendor:publish --provider="Spatie\\Activitylog\\ActivitylogServiceProvider" --tag="activitylog-migrations"
php artisan vendor:publish --provider="Spatie\\Activitylog\\ActivitylogServiceProvider" --tag="activitylog-config"
php artisan migrate
```

3. After installation, the component will automatically call `activity()->performedOn($model)->causedBy($user)->withProperties(['changes' => $changes])->log($action)` when records are created or updated.

4. The details modal will show recent activity entries for the model (if present).

If you prefer a custom audit table we can scaffold that instead; otherwise the Spatie package is the fastest path to structured change history.

Embedding in a `show` page

- The component now supports two optional mount-time props: `:read-only` and `:show-id`.
- To embed the component in a model show page and open the details modal immediately use:

```blade
<livewire:reference-crud :model-class="App\Models\Province::class" :fields="$fields" :read-only="true" :show-id="$province->id" />
```

This disables create/edit/delete actions and auto-opens the details modal for the specified model id. It's useful when you want the `ReferenceCrud` details UI available as the canonical show view for a model.

Notes & caveats

- The component is designed for small-to-medium-sized reference tables. For very large tables, do not rely on the client-side row filter.
- Keep `fields` keys aligned with actual DB columns to avoid SQL errors.

If you want, I can now:
- Create `config/reference-fields.php` and migrate the existing `provinces` fields into it and update the page to read from config (quick batch operation).
- Batch-generate the remaining reference pages using the same pattern.
- Add a policy scaffold to secure the CRUD operations per-model.

