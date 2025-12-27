# Refactored Reference CRUD Blade (partials and usage)

This document explains the Blade refactor for the reference CRUD UI. It shows the main orchestration file, lists the partials created, and explains design rules (what to keep in PHP vs Blade), and how the Blade consumes the normalized `details` prepared by the services.

## Goals
- Remove inline client-side filtering JavaScript because Livewire already provides server-driven search and introduces subtle sync bugs.
- Split the large monolithic template into small partials: `toolbar`, `table`, `cards`, `actions`, and `modals/*`.
- Ensure Blade only renders pre-normalized data; move formatting and date handling into `ReferenceDetailsBuilder` and `ActivityHistoryNormalizer`.

## Orchestrator: `resources/views/livewire/reference/crud.blade.php`

Content:

```blade
<div class="reference-crud">
    @include('livewire.reference.partials.toolbar')

    @if($view === 'rows')
        @include('livewire.reference.partials.table')
    @else
        @include('livewire.reference.partials.cards')
    @endif

    @includeWhen($showModal, 'livewire.reference.partials.modals.form')
    @includeWhen($showConfirmDeleteModal, 'livewire.reference.partials.modals.delete')
    @includeWhen($showChangesModal, 'livewire.reference.partials.modals.changes')
    @includeWhen($showDetailsModal, 'livewire.reference.partials.modals.details')
</div>
```

Explanation: This small file is only responsible for sequencing and choosing which partial to render. It never contains formatting or parsing logic; it simply includes the toolbar and either the table or cards partial, and it conditionally includes modals with `@includeWhen()` so modal markup is only present when needed.

## Partials created (paths under `resources/views/livewire/reference/partials`)

- `toolbar.blade.php` — search input, per-page select, view toggle, create button.
- `table.blade.php` — table header, rows loop, pagination; rows use `@include('...actions')` for action buttons and use `wire:key` to stabilize DOM updates.
- `cards.blade.php` — card grid; each card includes `actions` partial.
- `actions.blade.php` — centralizes edit/show/delete UI, avoiding duplication between table and cards.
- `modals/form.blade.php` — form modal that includes the existing `_form-fields` partial used previously.
- `modals/delete.blade.php` — confirmation modal for delete.
- `modals/changes.blade.php` — shows change summary computed by `ChangeSetBuilder`.
- `modals/details.blade.php` — details modal that consumes `$details` produced by `ReferenceDetailsBuilder` and `ActivityHistoryNormalizer`.
- `activity-row.blade.php` — small partial used by the details modal to render each normalized activity entry.

## Partial details (what each partial expects and renders)

- `toolbar.blade.php`
    - Purpose: top-level controls for searching, paging, toggling views, and creating a new record.
    - Inputs used from the component: `$search`, `$perPage`, `$view`, `$readOnly` and Livewire methods `setView()` and `create()`.
    - Notes: Keep controls minimal. The `input` uses `wire:model.debounce.300ms="search"` so Livewire drives the search behavior.

- `table.blade.php`
    - Purpose: render the rows view as a responsive table with sortable headers and pagination links.
    - Inputs: `$items` (paginated), `$fields` (field definitions), `$readOnly` and Livewire methods like `sortBy()`.
    - Behavior: each row includes `wire:key="reference-row-{{ $item->getKey() }}` to stabilize DOM diffs. Action buttons are rendered via the `actions` partial.

- `cards.blade.php`
    - Purpose: render the cards view (compact cards) for the same dataset.
    - Inputs: `$items`, `$fields`, `$readOnly`.
    - Behavior: each card uses `wire:key` and includes the `actions` partial. Keep card content simple—only display the main identifying field(s).

- `actions.blade.php`
    - Purpose: single source for edit, show, and delete buttons used by both table rows and cards.
    - Inputs: expects an `id` variable and honors `$readOnly` (if set) to hide destructive actions.
    - Behavior: Calls Livewire handlers directly: `edit($id)`, `show($id)`, and `confirmDelete($id)`.

- `modals/form.blade.php`
    - Purpose: modal wrapper that includes the existing form partial (`livewire.reference._form-fields`).
    - Inputs: `$showModal`, `$selectedId`, `$fields`, and uses Livewire `save`/cancel actions.
    - Notes: Keep actual form field markup in `_form-fields` so the modal is a purely presentational wrapper.

- `modals/delete.blade.php`
    - Purpose: confirmation dialog for deletions.
    - Inputs: `$showConfirmDeleteModal` and Livewire `performDelete` action.
    - Behavior: Minimal markup with cancel and confirm buttons; the confirm button triggers the component delete flow.

- `modals/changes.blade.php`
    - Purpose: shows the change-set computed by `ChangeSetBuilder` before persisting changes.
    - Inputs: `$showChangesModal`, `$changes` (array where each entry has `label`, `old`, `new`), Livewire `cancelSave` and `confirmSave` actions.
    - Behavior: Render a small diff table; if `$changes` is empty, show a friendly message.

- `modals/details.blade.php`
    - Purpose: details / show modal that renders the normalized `$details` payload prepared by `ReferenceDetailsBuilder` and `ActivityHistoryNormalizer`.
    - Inputs: `$showDetailsModal`, `$details` (array), `$fields` and Livewire `closeDetails`.
    - Behavior: The partial reads `$details` only; it does not call Carbon or parse Spatie properties. Recent activity is rendered by iterating `$details['_meta']['activity']` and delegating to `activity-row`.

- `activity-row.blade.php`
    - Purpose: render a single normalized activity entry (one row in the recent changes list).
    - Inputs: `$a` (normalized activity with `created_at_human`, `causer_name`, `rows` and `description`).
    - Behavior: Prefer `rows` (field diffs) and render a small table; fall back to `description` if no structured rows are present.

These explicit expectations make the Blade partials easier to reason about and ensure the component provides predictable inputs. When adding features, update the services that produce the data shape first, then the partial that renders it.

## Blade responsibilities (rules)

- Blade must only render data supplied by the component; it should not call Carbon or attempt to parse Spatie `properties` structures.
- All date formatting (e.g., Manila time and `created_at_human`) must be done in the PHP side (`ReferenceDetailsBuilder`, `ActivityHistoryNormalizer`). The Blade simply prints those strings.
- Field formatting (numbers, dates, masks) should be applied in PHP via a `format` entry on the field config; Blade only prints the provided formatted value.
- Blade should use `wire:key` for repeated elements to avoid DOM diff problems.

## Example: details modal expectations

- `$details` is an array built by `ReferenceDetailsBuilder::build($model, $fields)`.
- `$details['_meta']['activity']` is an array of normalized activity entries returned by `ActivityHistoryNormalizer::normalize(...)`. Each item has `id`, `created_at`, `created_at_human`, `causer_name`, `description`, and `rows` where `rows` is an array of `['field','old','new']` entries.
- The details partial includes `activity-row` for each normalized entry, and the partial renders `created_at_human` and `rows` without any parsing logic.

## Why this helps

- Small partials simplify maintenance and review; UI changes are isolated to the relevant partial.
- Moving formatting into PHP makes the Blade lean and predictable, reduces duplication, and centralizes logic for tests.
- Removing inline JS eliminates a duplicate search implementation and prevents client/server state drift.

## How to extend

- To add a field-specific formatter, add a `format` key to the field config and call a `FieldRenderer` (implement in PHP) while building `$data` in `ReferenceDetailsBuilder` or before listing rows in the table partial.
- To add more activity shapes, extend `ActivityHistoryNormalizer` to produce the agreed-upon schema and update `activity-row.blade.php` accordingly.

---

End of document.

