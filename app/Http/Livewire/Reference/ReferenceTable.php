<?php

namespace App\Http\Livewire\Reference;

use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\BuildsReferenceQuery;
use App\Http\Livewire\Traits\SelectRows;
use Illuminate\Support\Str;
use App\Services\ReferenceFieldOptionResolver;
use App\Services\ReferenceDisplayFormatter;

class ReferenceTable extends Component
{
    use WithPagination;
    use BuildsReferenceQuery;
    use SelectRows;

    public string $modelClass;
    public ?string $configKey;
    public array $fields = [];
    // Which fields are currently visible in the table (by key)
    public array $visibleFields = [];
    // Filters applied to the query
    public array $filters = [];
    public ?string $filterField = null;
    public string $filterOperator = 'contains';
    public $filterValue = null;
    public string $view = 'rows';
    public bool $readOnly = false;
    protected array $rawFields = [];

    public string $search = '';
    public string $sort = 'id';
    public string $direction = 'desc';
    public int $perPage = 15;

    // Row selection for bulk actions
    /**
     * Array of selected row IDs (strings).
     * Stored as strings to avoid checkbox type mismatches.
     * @var string[]
     */
    public array $selected = [];

    /**
     * Whether the current page's rows are all selected.
     */
    public bool $selectAll = false;

    protected $updatesQueryString = ['search', 'sort', 'direction'];

    protected $listeners = [
        'savedReference' => '$refresh',
        'refreshReferenceTable' => 'handleRefresh',
        'refreshReferenceArchive' => 'handleRefresh',
        // Events emitted by ReferenceToolbar
        'searchUpdated' => 'handleSearchUpdated',
        'filtersAdded' => 'handleFiltersAdded',
        'filtersRemoved' => 'handleFiltersRemoved',
        'filtersCleared' => 'handleFiltersCleared',
        'toggleVisibleField' => 'toggleVisibleField',
        'resetVisibleFields' => 'resetVisibleFields',
        // toolbar actions
        'deleteSelected' => 'deleteSelected',
        'setPerPage' => 'setPerPage',
        'setView' => 'setView',
    ];

    public function handleRefresh(): void
    {
        $this->resetPage();
        // Inform toolbar of current filters and selection so UI stays in sync after external actions
        $this->emit('setFilters', $this->filters);
        $this->emit('setSelected', $this->selected ?? []);
    }

    public function mount($modelClass = null, $configKey = null, $view = 'rows', $readOnly = false)
    {
        $this->modelClass = $modelClass;
        $this->configKey = $configKey;
        $this->view = $view;
        $this->readOnly = (bool) $readOnly;
        $this->rawFields = config('reference-tables.' . $this->configKey, []);
        $this->fields = $this->sanitizeFields($this->rawFields);

        // Initialize visibleFields to all configured field keys in order
        $keys = collect($this->fields)->pluck('key')->filter()->values()->toArray();
        $this->visibleFields = $keys;
    }

    /**
     * Toggle visibility of a single field key. Keeps column order consistent
     * with the configured fields.
     */
    public function toggleVisibleField(string $key): void
    {
        $allKeys = collect($this->fields)->pluck('key')->filter()->values()->toArray();

        if (in_array($key, $this->visibleFields, true)) {
            // remove
            $this->visibleFields = array_values(array_filter($this->visibleFields, fn($k) => $k !== $key));
        } else {
            // add while preserving configured order
            $new = array_values(array_filter($allKeys, fn($k) => in_array($k, $this->visibleFields, true) || $k === $key));
            $this->visibleFields = $new;
        }

        // Notify toolbar component(s) so their checkbox UI stays in sync
        $this->emit('setVisibleFields', $this->visibleFields);
    }

    /**
     * Reset visible fields to the default configured order (all keys).
     */
    public function resetVisibleFields(): void
    {
        $this->visibleFields = collect($this->fields)->pluck('key')->filter()->values()->toArray();
        $this->emit('setVisibleFields', $this->visibleFields);
    }

    // Filter methods are handled via toolbar events. Handlers below react to those events.

    public function handleSearchUpdated(string $val): void
    {
        $this->search = $val;
        $this->resetPage();
    }

    public function handleFiltersAdded(array $filter): void
    {
        $this->filters[] = $filter;
        $this->resetPage();
        $this->emit('setFilters', $this->filters);
    }

    public function handleFiltersRemoved(int $i): void
    {
        if (! isset($this->filters[$i])) {
            return;
        }

        array_splice($this->filters, $i, 1);
        $this->resetPage();
        $this->emit('setFilters', $this->filters);
    }

    public function handleFiltersCleared(): void
    {
        $this->filters = [];
        $this->resetPage();
        $this->emit('setFilters', $this->filters);
    }

    

    public function setView(string $v)
    {
        $this->view = $v;
        // Clear any row selection when switching views to avoid stale state
        $this->selected = [];
        $this->selectAll = false;
    }

    public function setPerPage($n)
    {
        $this->perPage = (int) $n;
        $this->resetPage();
    }

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

    // selection delegated to SelectRows trait

    // Selection behavior delegated to WithSelectableRows trait. Implement getSelectablePageIds().

    protected function getSelectablePageIds(): array
    {
        return $this->buildQuery()
            ->paginate($this->perPage)
            ->pluck('id')
            ->map(fn($i) => (string) $i)
            ->toArray();
    }

    /**
     * Override selector update to maintain selectAll state and notify toolbar.
     */
    public function updatedSelected()
    {
        $pageIds = $this->getSelectablePageIds();

        if (empty($pageIds)) {
            $this->selectAll = false;
        } else {
            $selected = array_map('strval', $this->selected ?? []);
            $intersection = array_intersect($pageIds, $selected);
            $this->selectAll = count($intersection) === count($pageIds);
        }
        $this->emit('setSelected', $this->selected ?? []);
        // Also emit a global update so any sibling/child toolbar can pick it up
        $this->emit('selectedUpdated', $this->selected ?? []);
    }

    public function deleteSelected()
    {
        if (empty($this->selected)) {
            return;
        }

        // dispatch an event with selected ids for the delete handler/modal
        $this->dispatch('deleteReferences', $this->selected);

        // clear selection
        $this->selected = [];
        $this->selectAll = false;
        // ensure toolbar sees the cleared selection immediately
        $this->emit('setSelected', []);
        $this->emit('selectedUpdated', []);
    }

    // Relay actions to other reference components via server-side emits
    public function relayShow(int $id): void
    {
        $this->dispatch('showReference', $id);
    }

    public function relayEdit(int $id): void
    {
        $this->dispatch('editReference', $id);
    }

    public function relayDelete(int $id): void
    {
        $this->dispatch('deleteReference', $id);
    }

    public function render()
    {
        // Use the framework's default paginator styling (Tailwind) so links
        // match the archive modal styles.

        // Reload configured fields from config to ensure consistent field metadata
        if (! empty($this->configKey)) {
            $this->rawFields = config('reference-tables.' . $this->configKey, []);
        }

        // Resolve options via ReferenceFieldOptionResolver (handles callables and FK fallbacks)
        $source = ! empty($this->rawFields) ? $this->rawFields : $this->fields;
        $resolver = app(ReferenceFieldOptionResolver::class);
        $resolvedFields = $resolver->resolve($source);

        $paginator = $this->buildQuery()->paginate($this->perPage);

        // Precompute display values per row and per field to keep Blade simple.
        $displayValues = [];
        $collection = $paginator->getCollection();
        $formatter = app(ReferenceDisplayFormatter::class);

        foreach ($collection as $row) {
            $id = (string) $row->getKey();
            foreach ($resolvedFields as $f) {
                $key = $f['key'] ?? null;
                $displayValues[$id][$key] = $formatter->formatFieldValue($row, $f);
            }
        }

        return view('livewire.reference.reference-table', [
            'items' => $paginator,
            'fields' => $resolvedFields,
            'displayValues' => $displayValues,
        ]);
    }

    private function sanitizeFields(array $fields): array
    {
        return collect($fields)->map(function ($f) {
            if (isset($f['options']) && is_callable($f['options'])) {
                $f['options'] = [];
            }
            return $f;
        })->toArray();
    }
}
