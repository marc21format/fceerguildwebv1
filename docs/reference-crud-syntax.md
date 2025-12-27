ReferenceCrud — Essential Syntax & Functions (per file)

This quick reference lists the essential methods, Livewire lifecycle hooks, Blade directives, and JavaScript snippets used in the `ReferenceCrud` implementation. Use this as a compact cheat-sheet when editing or extending the component.

1) app/Http/Livewire/ReferenceCrud.php
- Class: `App\Http\Livewire\ReferenceCrud` (extends `Livewire\Component`)
- Traits:
  - `use WithPagination;` — Livewire pagination helpers (provides `resetPage()`)
- Public properties (key ones):
  - `$modelClass`, `$fields`, `$perPage`, `$search`, `$sort`, `$direction`
  - `$state`, `$selectedId`, `$originalData`, `$changes`
  - `$showModal`, `$showChangesModal`, `$showConfirmDeleteModal`
  - `$readOnly` (bool): when `true` disables create/edit/delete actions so the component can be embedded as a read-only details viewer.
  - `$showId` (int|null): if provided the component will auto-open the details modal for that record on mount (useful when mounting inside a `show` page).
- Lifecycle / hooks / listeners:
  - `protected $listeners = ['refreshList' => '$refresh'];` — allow external refresh
  - `public function mount($modelClass = null, $fields = [])` — component initializer
  - `public function render()` — returns view with computed `$items`
- Livewire lifecycle methods used:
  - `public function updatedSearch()` — called when `$search` changes (reset pagination)
  - `public function updatedPerPage()` — called when `$perPage` changes (reset pagination)
- Sorting:
  - `public function sortBy($column, $dir = null)` — set or toggle the current sort column and direction, then `resetPage()`.
    - Calling `sortBy('name', 'asc')` forces ascending sort on `name`.
    - Calling `sortBy('name')` toggles between `asc` and `desc` when `name` is already the active sort column.
  - Showing details:
    - `public function show($id)` — load a record and set `$details` and `$showDetailsModal` to display the details modal. You can also pass `:show-id` when mounting to open details immediately.
    - `public function closeDetails()` — close the details modal and clear `$details`.
- CRUD methods:
  - `create()` — prepares for new record
  - `edit($id)` — loads model into `$state` and `$originalData`
  - `save()` — validates and computes `changes` (opens confirm modal)
  - `confirmSave()` — actually persists model
  - `delete($id)` — legacy direct delete
  - `confirmDelete($id)` + `performDelete()` — deletion with confirmation
- Query/search pattern in `render()`:
  - Uses Eloquent query builder: `($this->modelClass)::query()`
  - Case-insensitive search: `orWhereRaw("LOWER(COALESCE({$qualified},'')) LIKE ?", ["%{$lower}%"])`
  - Ordering and pagination: `->orderBy($this->sort, $this->direction)->paginate($this->perPage)`

Notes:
- Keep `$fields` keys aligned with actual DB column names.

2) resources/views/livewire/reference/crud.blade.php
- Blade / Livewire directives used:
  - `<input wire:model.debounce.300ms="search" />` — bind search input with debounce
  - `<select wire:model="perPage">` — bind page size
  - `wire:click="create"`, `wire:click="edit({{ $item->id }})"` — call component methods
  - `@foreach($items as $item)` — iterate pagination results
  - `{{ $items->links() }}` — render pagination links
- Blade partial include:
  - `@include('livewire.reference._form-fields', ['fields' => $fields])`
- Column sorting in headers:
  - Each column header includes up/down arrow buttons implemented as `flux:button` elements that call the component: `wire:click="sortBy('{key}', 'asc')"` and `wire:click="sortBy('{key}', 'desc')"`.
  - The component's `render()` uses `$this->sort` and `$this->direction` when building the `orderBy(...)` clause, so clicking the arrows reorders the table server-side.
- Modals:
  - Conditional rendering with `@if($showModal) ... @endif` and `@if($showChangesModal)` for confirmation
  - Buttons call `wire:click="save"`, `wire:click="confirmSave"`, `wire:click="cancelSave"`
- UI notes:
  - Uses `flux:button`, `flux:` primitives from the Livewire starter kit UI package

3) resources/views/livewire/reference/_form-fields.blade.php
- Purpose: render inputs based on `$fields` config
- Example input bindings used:
  - `<input wire:model.defer="state.{$field['key']}" />` — defer model update until save
  - Conditional rendering for `type` (`text`, `textarea`, `checkbox`, `select`)
- Validation error display:
  - `@error('state.' . $field['key']) <div>{{ $message }}</div> @enderror`

4) resources/views/pages/admin/provinces.blade.php
- Example page mounting component:
  - `@php $fields = [['key' => 'name', 'label' => 'Name', 'type' => 'text', 'rules' => 'required|string|max:255']]; @endphp`
  - `<livewire:reference-crud :model-class="App\Models\Province::class" :fields="$fields" />`
  - Mounting in a read-only show page example (`resources/views/pages/admin/provinces/show.blade.php`):

```blade
@php
  $fields = [['key' => 'name', 'label' => 'Name', 'type' => 'text']];
@endphp

<livewire:reference-crud :model-class="App\Models\Province::class" :fields="$fields" :read-only="true" :show-id="$province->id" />
```
- Page layout uses `x-layouts.app.sidebar` and `flux:main` wrapper

5) client-side fallback script (inside `crud.blade.php`)
- Small vanilla JS snippet attached to `.reference-crud` container:
  - Selects the search input and table `tbody` rows
  - Adds `input` listener to hide/show rows based on `row.textContent.toLowerCase().indexOf(query) !== -1`
  - Re-attaches using `Livewire.hook('message.processed', ...)` after Livewire updates
- Note: progressive enhancement only — not suitable for very large datasets
