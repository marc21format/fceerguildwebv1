<?php

namespace App\Http\Livewire\Reference\Modal;

use Livewire\Component;
use App\Support\ChangeSetBuilder;
use Illuminate\Support\Str;
use App\Services\ReferenceFieldOptionResolver;

class ReferenceFormModal extends Component
{
    public string $modelClass;
    public ?string $configKey;
    public array $fields = [];
    protected array $rawFields = [];

    public array $state = [];
    public array $originalData = [];
    public array $changes = [];
    public ?int $selectedId = null;
    public bool $open = false;
    public array $resolvedFields = [];

    protected $listeners = [
        'createReference' => 'create',
    'editReference' => 'edit',
    ];

    public function mount($modelClass = null, $configKey = null, $fields = [])
    {
        $this->modelClass = $modelClass;
        $this->configKey = $configKey;
        // keep raw config (may contain callables) out of public properties
        $this->rawFields = $fields;
        if (empty($this->rawFields) && $this->configKey) {
            $this->rawFields = config('reference-tables.' . $this->configKey) ?? [];
        }
        // Resolve callable options immediately (old behavior) so dropdowns are populated on first render.
        $this->fields = $this->resolveOptions($this->rawFields ?: []);
        $this->resolvedFields = $this->fields;
    }

    public function create(): void
    {
        $this->resetForm();
        // refresh resolved options before opening
        $this->resolvedFields = $this->resolveOptions($this->rawFields ?: $this->fields);
        \Log::debug('ReferenceFormModal.create.resolvedFields', ['configKey' => $this->configKey, 'resolved' => $this->resolvedFields]);
        $this->open = true;
    }

    public function setFieldValue(string $key, $value): void
    {
        // cast numeric strings back to int when appropriate
        if (is_numeric($value)) {
            $value = $value + 0;
        }

        $this->state[$key] = $value;
    }

    protected function resetForm(): void
    {
        $this->state = [];
        foreach ($this->fields as $f) {
            $this->state[$f['key']] = $f['default'] ?? null;
        }
        $this->originalData = [];
        $this->selectedId = null;
        $this->changes = [];
    }

    public function edit($id): void
    {
        $model = ($this->modelClass)::findOrFail($id);
        $this->selectedId = $id;
        $this->populateFromModel($model);
        $this->open = true;
    }

    protected function populateFromModel($model): void
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

    public function rules(): array
    {
        $rules = [];
        foreach ($this->fields as $f) {
            if (! empty($f['rules'] ?? null)) {
                $rules['state.'.$f['key']] = $f['rules'];
            }
        }
        return $rules;
    }

    public function save(): void
    {
        $this->validate($this->rules());

        $this->changes = ChangeSetBuilder::from(
            $this->fields,
            $this->originalData,
            $this->state
        );

        $this->dispatch('confirmReferenceSave', [
            'id' => $this->selectedId,
            'state' => $this->state,
            'changes' => $this->changes,
            'modelClass' => $this->modelClass,
        ]);

        $this->open = false;
    }

    public function render()
    {
        // resolvedFields should already be populated in mount/create/edit
        return view('livewire.reference.modal.form-modal', ['fields' => $this->resolvedFields]);
    }

    protected function resolveOptions(array $source): array
    {
        $resolver = app(ReferenceFieldOptionResolver::class);
        return $resolver->resolve($source);
    }

    // Field sanitization delegated to `ReferenceFieldSanitizer` service when needed.
}
