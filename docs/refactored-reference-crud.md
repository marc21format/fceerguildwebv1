# Refactored ReferenceCrud — Services, Trait, and Support

This document explains the refactor performed on `ReferenceCrud` (Livewire component). It describes the new pieces added (traits, services, support helpers), shows their full code, and explains the intent and behavior of each line or small block in paragraph form.

**Files added / changed**
- `app/Http/Livewire/ReferenceCrud.php` (refactored)
- `app/Http/Livewire/Traits/BuildsReferenceQuery.php` (trait)
- `app/Services/ActivityLogger.php` (service)
- `app/Support/ChangeSetBuilder.php` (helper)
- `app/Services/ReferenceDetailsBuilder.php` (service)
- `app/Services/ActivityHistoryNormalizer.php` (service)

---

## ActivityLogger (app/Services/ActivityLogger.php)

Code:

```php
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class ActivityLogger
{
    public function logCreateOrUpdate(
        Model $model,
        string $action,
        array $changes,
        ?object $causer = null
    ): void {
        $activity = activity()
            ->performedOn($model)
            ->withProperties([
                'changes' => $changes,
                'attributes' => $model->getAttributes(),
            ]);

        if ($causer) {
            $activity->causedBy($causer);
        }

        $activity->log($action);
    }

    public function logDelete(
        Model $model,
        array $attributes,
        ?object $causer = null
    ): void {
        $activity = activity()
            ->performedOn($model)
            ->withProperties(['attributes' => $attributes]);

        if ($causer) {
            $activity->causedBy($causer);
        }

        $activity->log('deleted');
    }
}
```

Explanation (paragraph form):
This service centralizes activity log creation using the Spatie activity helper. The class declares two public methods to cover create/update and delete use cases. `logCreateOrUpdate` accepts the `Model` instance, the `action` string (`created` or `updated`), the computed `changes` array, and an optional `causer` object. It builds an `activity()` call, attaches the model via `performedOn`, and places a canonical payload under `changes` and `attributes`. Attaching the causer is conditional so the service is usable in contexts where there may be no authenticated user. Finally it calls `log($action)` to persist the entry. `logDelete` is similar but uses a smaller payload that only includes the snapshot `attributes` (captured prior to deletion) and logs the `deleted` action. The service isolates the activity payload shape and avoids duplication in the UI component.

---

## ChangeSetBuilder (app/Support/ChangeSetBuilder.php)

Code:

```php
<?php

namespace App\Support;

class ChangeSetBuilder
{
    public static function from(array $fields, array $original, array $current): array
    {
        $changes = [];

        foreach ($fields as $f) {
            $key = $f['key'] ?? null;
            if ($key === null) {
                continue;
            }

            $old = $original[$key] ?? null;
            $new = $current[$key] ?? null;

            if (is_array($old) || is_object($old)) {
                $oldNorm = json_encode($old);
            } else {
                $oldNorm = (string) $old;
            }

            if (is_array($new) || is_object($new)) {
                $newNorm = json_encode($new);
            } else {
                $newNorm = (string) $new;
            }

            if ($oldNorm !== $newNorm) {
                $changes[$key] = [
                    'label' => $f['label'] ?? $key,
                    'old' => $old,
                    'new' => $new,
                ];
            }
        }

        return $changes;
    }
}
```

Explanation: This static helper computes a change-set by iterating the field definitions (`$fields`) that drive the CRUD UI. For each configured `key` it compares the `original` and `current` values. Arrays/objects are normalized to JSON strings to produce stable comparisons; scalars are string-cast. If the normalized values differ, a change entry is built with `label`, `old`, and `new`. Returning only changed keys keeps the UI's change confirmation focused and allows the activity payload to be small. This logic is business logic, extracted from the Livewire component so it can be unit-tested and reused.

---

## ReferenceDetailsBuilder (app/Services/ReferenceDetailsBuilder.php)

Code:

```php
<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ReferenceDetailsBuilder
{
    public function build(Model $model, array $fields): array
    {
        $data = [];

        foreach ($fields as $f) {
            $key = $f['key'] ?? null;
            if ($key === null) {
                continue;
            }
            $data[$key] = data_get($model, $key);
        }

        $createdAt = $model->created_at ?? null;
        $updatedAt = $model->updated_at ?? null;

        $data['_meta'] = [
            'created_at' => (string) $createdAt,
            'updated_at' => (string) $updatedAt,
            'created_at_human' => $createdAt ? Carbon::parse($createdAt)->timezone('Asia/Manila')->format('Y-m-d g:i A') : null,
            'updated_at_human' => $updatedAt ? Carbon::parse($updatedAt)->timezone('Asia/Manila')->format('Y-m-d g:i A') : null,
            'created_by' => optional($model->createdBy)->name ?: null,
            'updated_by' => optional($model->updatedBy)->name ?: null,
        ];

        return $data;
    }
}
```

Explanation: This builder extracts a field-driven snapshot of a model for the details modal. It iterates `$fields` and reads each `key` from the provided `$model` with `data_get` so nested attributes are supported. It then constructs a `_meta` block containing raw timestamps and human-friendly Manila-formatted timestamps using Carbon. Including `created_by` and `updated_by` helps the UI show user names without calling relationships in the Blade. The central idea is to perform all formatting and normalization in PHP so the view can simply render predictable data.

---

## ActivityHistoryNormalizer (app/Services/ActivityHistoryNormalizer.php)

Code:

```php
<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ActivityHistoryNormalizer
{
    public function normalize(Collection $activities, array $fields): array
    {
        return $activities->map(function ($act) use ($fields) {
            $props = $act->properties ?? [];
            if ($props instanceof Collection) {
                $props = $props->toArray();
            }

            $rows = [];

            if (! empty($props['changes']) && is_array($props['changes'])) {
                foreach ($props['changes'] as $key => $change) {
                    $rows[] = [
                        'field' => $change['label'] ?? $key,
                        'old' => $change['old'] ?? null,
                        'new' => $change['new'] ?? null,
                    ];
                }
            } elseif (! empty($props['attributes']) && is_array($props['attributes'])) {
                foreach ($props['attributes'] as $key => $val) {
                    $label = collect($fields)->firstWhere('key', $key)['label'] ?? $key;

                    $rows[] = [
                        'field' => $label,
                        'old' => null,
                        'new' => $val,
                    ];
                }
            }

            return [
                'id' => $act->id,
                'created_at' => (string) $act->created_at,
                'created_at_human' => optional($act->created_at)->timezone('Asia/Manila') ? optional($act->created_at->timezone('Asia/Manila'))->format('Y-m-d g:i A') : (string) $act->created_at,
                'causer_name' => optional($act->causer)->name ?: null,
                'description' => $act->description ?? null,
                'rows' => $rows,
            ];
        })->all();
    }
}
```

Explanation: This service converts Spatie activity model entries into a UI-friendly array. It accepts a collection of activities (already eager-loaded with `causer`) and the `$fields` configuration so labels can be inferred for snapshot-style activities. For each activity it inspects `properties` (which may be a `Collection`) and builds a uniform `rows` array describing the field-level diffs or created attributes. It also includes both the raw `created_at` and a `created_at_human` formatted in Manila time; `causer_name` is provided to avoid Blade-level optional chaining. This normalization gives the view a consistent schema to render and eliminates Blade fallback logic and specialized parsing.

---

## BuildsReferenceQuery trait (app/Http/Livewire/Traits/BuildsReferenceQuery.php)

Code:

```php
<?php

namespace App\Http\Livewire\Traits;

trait BuildsReferenceQuery
{
    protected function buildQuery()
    {
        $query = ($this->modelClass)::query();
        $table = (new $this->modelClass)->getTable();

        $search = trim($this->search ?? '');
        if ($search !== '') {
            $lower = mb_strtolower($search);

            $query->where(function ($q) use ($lower, $table) {
                foreach ($this->fields as $f) {
                    $type = $f['type'] ?? 'text';
                    $searchable = $f['searchable'] ?? in_array($type, ['text', 'string']);
                    if (! $searchable) {
                        continue;
                    }

                    $col = $f['key'];
                    $qualified = "{$table}.{$col}";

                    try {
                        $q->orWhereRaw("LOWER(COALESCE({$qualified},'')) LIKE ?", ["%{$lower}%"]);
                    } catch (\Throwable $e) {
                        // Fallback to simpler where in case raw is not supported for this DB
                        $q->orWhere($col, 'like', "%{$search}%");
                    }
                }
            });
        }

        return $query->orderBy($this->sort, $this->direction);
    }
}
```

Explanation: This trait isolates the search and ordering query logic previously embedded in `render()`. It builds a base query for the configured `$modelClass`, inspects the configured `$fields` to determine which columns are searchable, and composes an ORed where clause. The implementation prefers a lowercased COALESCE raw SQL match to avoid ambiguity, but gracefully falls back to a simple `where like` if the database does not accept the raw expression. Returning the ordered query allows the Livewire component to keep pagination and presentation concerns separate.

---

## ReferenceCrud (app/Http/Livewire/ReferenceCrud.php) — full file

Code (full):

```php
<?php

namespace App\Http\Livewire;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Support\ChangeSetBuilder;
use App\Services\ActivityLogger;
use App\Services\ReferenceDetailsBuilder;
use App\Services\ActivityHistoryNormalizer;
use App\Http\Livewire\Traits\BuildsReferenceQuery;

class ReferenceCrud extends Component
{
    use WithPagination;
    use BuildsReferenceQuery;

    public $modelClass;
    public $fields = [];
    public $perPage = 15;
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';
    public $view = 'rows';
    // optional runtime mode: read-only mode for embedding in show pages
    public $readOnly = false;
    // when provided, component will auto-open the details modal for this id on mount
    public $showId = null;

    // allow sorting from the table headers
    public function sortBy($column, $dir = null)
    {
        if ($dir) {
            $this->sort = $column;
            $this->direction = $dir;
        } else {
            if ($this->sort === $column) {
                $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
            } else {
                $this->sort = $column;
                $this->direction = 'asc';
            }
        }

        $this->resetPage();
    }

    public $state = [];
    public $selectedId = null;
    public $showModal = false;
    public $originalData = [];
    public $changes = [];
    public $showChangesModal = false;
    public $showDetailsModal = false;
    public $details = [];
    public $confirmingDeleteId = null;
    public $showConfirmDeleteModal = false;

    protected $listeners = [
        'refreshList' => '$refresh',
        'showReference' => 'show',
        'editReference' => 'edit',
    ];

    public function mount($modelClass = null, $fields = [])
    {
        $this->modelClass = $modelClass;
        $this->fields = $fields;
        $this->resetState();
        if (! empty($this->showId)) {
            try {
                $this->show($this->showId);
            } catch (\Throwable $e) {
            }
        }
    }

    public function rules()
    {
        $rules = [];
        foreach ($this->fields as $f) {
            if (! empty($f['rules'] ?? null)) {
                $rules['state.'.$f['key']] = $f['rules'];
            }
        }
        return $rules;
    }

    public function setView($which)
    {
        if (in_array($which, ['rows', 'cards'])) {
            $this->view = $which;
        }
    }

    public function resetState()
    {
        $this->state = [];
        foreach ($this->fields as $f) {
            $this->state[$f['key']] = $f['default'] ?? null;
        }
        $this->selectedId = null;
    }

    public function create()
    {
        $this->resetState();
        $this->originalData = [];
        $this->changes = [];
        $this->showChangesModal = false;
        $this->showModal = true;
    }

    public function edit($id)
    {
        $model = ($this->modelClass)::findOrFail($id);
        $this->selectedId = $id;
        $this->populateStateFromModel($model);
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate($this->rules());

        $this->changes = ChangeSetBuilder::from(
            $this->fields,
            $this->originalData,
            $this->state
        );

        // show confirmation modal with computed changes; do not persist yet
        $this->showChangesModal = true;
        // hide edit modal while confirming
        $this->showModal = false;
    }

    public function confirmSave()
    {
        $wasNew = empty($this->selectedId);
        $logger = app(ActivityLogger::class);
        $modelClass = $this->modelClass;

        DB::transaction(function () use ($wasNew, $logger, $modelClass) {
            if (! $wasNew) {
                $model = ($modelClass)::findOrFail($this->selectedId);
                $model->fill($this->state);
                if (auth()->check()) {
                    $model->updated_by_id = auth()->id();
                }
                $model->save();
            } else {
                $model = new ($modelClass)();
                $model->fill($this->state);
                if (auth()->check()) {
                    $model->created_by_id = auth()->id();
                    $model->updated_by_id = auth()->id();
                }
                $model->save();
            }

            $logger->logCreateOrUpdate(
                $model,
                $wasNew ? 'created' : 'updated',
                $this->changes,
                auth()->user()
            );
        });
        $this->cleanupAfterSave();
    }

    protected function populateStateFromModel($model): void
    {
        $this->state = [];
        $this->originalData = [];
        foreach ($this->fields as $f) {
            $k = $f['key'] ?? null;
            if ($k === null) {
                continue;
            }
            $this->state[$k] = data_get($model, $k);
            $this->originalData[$k] = data_get($model, $k);
        }
    }

    protected function cleanupAfterSave(): void
    {
        $this->showChangesModal = false;
        $this->changes = [];
        $this->originalData = [];
        $this->selectedId = null;
        $this->resetPage();
    }

    public function cancelSave()
    {
        // user canceled; return to edit/create modal for further changes
        $this->showChangesModal = false;
        $this->showModal = true;
    }

    public function updatedSearch()
    {
        \Log::debug('ReferenceCrud.updatedSearch', ['search' => $this->search]);
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        // legacy direct delete method (kept for compatibility)
        $m = ($this->modelClass)::findOrFail($id);
        $m->delete();
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeleteId = $id;
        $this->showConfirmDeleteModal = true;
    }

    public function show(
        $id
    ) {
        $model = ($this->modelClass)
            ::with(['createdBy', 'updatedBy'])
            ->findOrFail($id);

        $this->details = app(ReferenceDetailsBuilder::class)->build($model, $this->fields);

        $activityModel = config(
            'activitylog.activity_model',
            \Spatie\Activitylog\Models\Activity::class
        );

        $activity = $activityModel::with('causer')
            ->where('subject_type', get_class($model))
            ->where('subject_id', $model->getKey())
            ->latest()
            ->limit(20)
            ->get();

        $this->details['_meta']['activity'] = app(ActivityHistoryNormalizer::class)->normalize($activity, $this->fields);

        $this->showDetailsModal = true;
    }

    public function closeDetails()
    {
        $this->showDetailsModal = false;
        $this->details = [];
    }

    public function performDelete()
    {
        if (! $this->confirmingDeleteId) {
            return;
        }

        $logger = app(ActivityLogger::class);
        $modelClass = $this->modelClass;

        DB::transaction(function () use ($logger, $modelClass) {
            $m = ($modelClass)::findOrFail($this->confirmingDeleteId);
            $attributes = $m->getAttributes();
            $m->delete();

            $logger->logDelete($m, $attributes, auth()->user());
        });

        $this->showConfirmDeleteModal = false;
        $this->confirmingDeleteId = null;
        $this->resetPage();
    }

    public function render()
    {
        Paginator::useBootstrap();

        return view('livewire.reference.referencecrud', [
            'items' => $this->buildQuery()->paginate($this->perPage),
        ]);
    }
}
```

Explanation (how the component uses the new pieces):
The Livewire component now acts as a thin UI orchestrator. It keeps Livewire concerns (state, pagination, events) while delegating business and formatting work to the services and trait above. `BuildsReferenceQuery` is used from `render()` to get a query already filtered and ordered; pagination remains in the component so Livewire's `WithPagination` works normally. When the user edits/saves, `save()` delegates change computation to `ChangeSetBuilder::from(...)` and opens the confirmation modal. On `confirmSave()` the component uses `DB::transaction` to atomically persist the model and then calls `ActivityLogger->logCreateOrUpdate(...)` (via the container) to write the activity entry. `ReferenceDetailsBuilder` and `ActivityHistoryNormalizer` are used by `show()` to produce a fully-normalized `details` payload (with human timestamps and labeled rows) that the view can render without conditional parsing. `performDelete()` uses the `ActivityLogger::logDelete()` inside a transaction and then resets UI state. Helper methods `populateStateFromModel` and `cleanupAfterSave` keep the component small and readable.

Conceptually, this refactor moves diffing, formatting, and activity payload decisions out of the Blade and Livewire methods and into testable objects, while the Livewire component remains responsible for orchestrating UI transitions and invoking these services.

---

End of document.





































































