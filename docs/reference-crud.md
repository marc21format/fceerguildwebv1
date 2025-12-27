**Reference CRUD — Livewire Implementation**

**Overview**
- **Purpose:** Reusable Livewire CRUD for small reference/lookup tables (index, create, edit, delete, details with audit history).
- **Primary Component File:** [app/Http/Livewire/ReferenceCrud.php](app/Http/Livewire/ReferenceCrud.php)
- **Blade View:** [resources/views/livewire/reference/crud.blade.php](resources/views/livewire/reference/crud.blade.php)

**Component: ReferenceCrud**
- **File:** [app/Http/Livewire/ReferenceCrud.php](app/Http/Livewire/ReferenceCrud.php)
- **Purpose:** Encapsulates listing, search, sort, pagination, create/edit modal flows, delete confirmation, and details modal (with activity history).
- **Public properties:**
  - `modelClass`: fully-qualified model class string (e.g. `App\\Models\\Province::class`).
  - `fields`: array of field definitions (see Usage below).
  - `perPage`: int, pagination size.
  - `search`: string, search query.
  - `sort`: string, sort column.
  - `direction`: string, `asc` or `desc`.
  - `state`: array, bound form state used for create/edit.
  - `selectedId`: int|null, currently editing record id.
  - `showModal`, `showChangesModal`, `showConfirmDeleteModal`, `showDetailsModal`: booleans controlling UI.
  - `details`: array/object used by details modal to display metadata and activity.
  - `readOnly`: bool, when true hides create/edit/delete actions.
  - `showId`: bool, show primary key column in table if true.

- **Key methods (and where to find them):**
  - `mount()` — initial setup, resolves defaults.
  - `rules()` — returns validation rules derived from `fields`.
  - `resetState()` — clears form state.
  - `create()` — prepare UI for new record.
  - `edit($id)` — load a record into `state` for editing.
  - `save()` — validate and persist create/update; fires change-confirm modal if needed.
  - `confirmSave()` — finalizes the save after user confirms changes.
  - `updatedSearch()` — Livewire hook for search debounce handling.
  - `sortBy($column)` — toggles header sort.
  - `show($id)` — loads record metadata and activity history for details modal.
  - `closeDetails()` — clears details modal state.
  - `confirmDelete($id)` — opens delete confirmation.
  - `performDelete()` — permanently deletes selected record.
  - `render()` — composes the query (search/sort) and returns view with paginated results.

**Search & Sorting**
- Search is performed server-side in `render()` using case-insensitive SQL (LOWER/COALESCE) across configured fields.
- Sorting is controlled via `sort` and `direction` public props and `sortBy()` toggles direction when selecting the same column.

**Blade: table + modals**
- **File:** [resources/views/livewire/reference/crud.blade.php](resources/views/livewire/reference/crud.blade.php)
- **What it contains:**
  - Table with column headers and sort arrows.
  - Search input bound to `search` (`wire:model.debounce.300ms="search"`).
  - Per-row actions: Show, Edit, Delete (hidden when `readOnly` is true).
  - Create / Edit modal bound to `state`.
  - Changes confirmation modal (previous vs new values) shown before final save.
  - Delete confirmation modal.
  - Details modal showing `created_by`, `updated_by`, timestamps, and activity history.

**Form partial**
- **File:** [resources/views/livewire/reference/_form-fields.blade.php](resources/views/livewire/reference/_form-fields.blade.php)
- **Purpose:** Shared form rendering for the component; iterates `fields` and binds each input to `state.{key}`.
- **Syntax (usage):** include it from the modal form in `crud.blade.php` like:

```blade
@include('livewire.reference._form-fields', ['fields' => $fields, 'state' => $state])
```

**Field definition format (example)**
- `fields` is an array of field descriptors. Each descriptor commonly contains:
  - `key` : string — model attribute name (required).
  - `label` : string — human label for rendering.
  - `type` : string — `text`, `textarea`, `select`, `boolean`, etc.
  - `rules` : string|null — validation rules applied in `rules()`.
  - `options` : array|null — for `select` fields, list of choices.

Example in Blade or controller supplying view data:

```php
$fields = [
    ['key' => 'name', 'label' => 'Name', 'type' => 'text', 'rules' => 'required|string|max:255'],
    ['key' => 'code', 'label' => 'Code', 'type' => 'text', 'rules' => 'nullable|string|max:10'],
];
```

And mount the component in a page view:

```blade
<livewire:reference-crud :model-class="App\\Models\\Province::class" :fields="$fields" :per-page="15" />
```

To use read-only embed (no actions):

```blade
<livewire:reference-crud :model-class="App\\Models\\Province::class" :fields="$fields" :read-only="true" :show-id="true" />
```

Centralized config (recommended):

You can centralize `fields` definitions in `config/reference-tables.php` and reference them from pages. Example config file:

```php
return [
  'provinces' => [
    ['key' => 'name', 'label' => 'Name', 'type' => 'text', 'rules' => 'required|string|max:255'],
  ],
];
```

Then in a page view:

```blade
@php $fields = config('reference-tables.provinces'); @endphp
<livewire:reference-crud :model-class="App\\Models\\Province::class" :fields="$fields" />
```


**Audit / Activity history**
- Auditing is handled by the `ReferenceCrud` Livewire component. `ReferenceCrud` records `created`, `updated`, and `deleted` activities via `spatie/laravel-activitylog` and includes both:
  - `changes`: field-by-field old/new pairs (for friendly diffs), and
  - `attributes`: a snapshot of the record's attributes after the operation.

- The UI normalizes both shapes and renders a single, consistent Recent changes view in the Details modal.

**Spatie integration notes**
- If you want to persist history, install and configure `spatie/laravel-activitylog` per its docs. Migrations for `activity_log` must be published and migrated.
- After migrations, ensure the model uses `HasAuditFields` or manually call `activity()->log('...')` in your model observers.
