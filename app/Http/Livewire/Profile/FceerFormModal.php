<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FceerFormModal extends Component
{
    public bool $isOpen = false;
    public ?string $modelClass = null;
    public array $fields = [];
    public ?int $userId = null;
    public ?int $itemId = null;
    public array $options = [];
    public ?string $instanceKey = null;
    public ?string $modalView = null;

    // listen for the fceer-specific open event only
    protected $listeners = ['openFceerModal' => 'openFceerModal'];

    protected $rules = [];

    public function openFceerModal($params = [])
    {
        if (isset($params['instanceKey'])) {
            if ($this->instanceKey === null || $params['instanceKey'] !== $this->instanceKey) {
                return;
            }
        } else {
            if ($this->instanceKey !== null) {
                return;
            }
        }

        $this->modelClass = $params['modelClass'] ?? $this->modelClass;
        $this->userId = $params['userId'] ?? $this->userId;
        $this->itemId = $params['itemId'] ?? $this->itemId;
        if (isset($params['modalView'])) {
            $this->modalView = $params['modalView'];
        }

        if (!empty($params['fields']) && is_array($params['fields'])) {
            $this->fields = $params['fields'];
        } else {
            $cfg = config('profile.fceer');
            $fieldsCfg = $cfg['fields'] ?? [];
            $fields = [];
            foreach ($fieldsCfg as $key => $f) {
                $field = [
                    'key' => $key,
                    'label' => $f['label'] ?? ucfirst(str_replace('_', ' ', $key)),
                    'type' => $f['type'] ?? 'text',
                    'placeholder' => $f['placeholder'] ?? null,
                    'options' => $f['options'] ?? null,
                    'rules' => $f['rules'] ?? '',
                ];
                $fields[] = $field;
            }
            $this->fields = $fields;
        }

        $this->data = [];
        if ($this->itemId && $this->modelClass) {
            $item = $this->modelClass::find($this->itemId);
            if ($item) {
                foreach ($this->fields as $field) {
                    $this->data[$field['key']] = $item->{$field['key']};
                }
            }
        }

        $this->options = [];
        foreach ($this->fields as $field) {
            if (($field['type'] ?? '') === 'select' && isset($field['options'])) {
                if (is_string($field['options'])) {
                    $config = config('reference-tables.' . $field['options']);
                    if ($config && isset($config[0]['options']['model'])) {
                        $model = $config[0]['options']['model'];
                        $label = $config[0]['options']['label'];
                        $value = $config[0]['options']['value'];
                        $orderBy = $config[0]['options']['order_by'] ?? [];
                        $query = $model::query();
                        if ($orderBy) {
                            $query->orderBy(key($orderBy), reset($orderBy));
                        }
                        $this->options[$field['key']] = $query->pluck($label, $value)->toArray();
                    }
                } elseif (is_array($field['options'])) {
                    $this->options[$field['key']] = $field['options'];
                }
            }
        }

        $this->isOpen = true;
    }

    public function save()
    {
        $rules = [];
        foreach ($this->fields as $field) {
            $rules[$field['key']] = $field['rules'] ?? 'nullable';
        }

        $this->rules = $rules;
        $this->validate();

        $data = $this->data;
        $data['user_id'] = $this->userId;
        $data['created_by_id'] = Auth::id();
        $data['updated_by_id'] = Auth::id();

        // Address creation/updating should be handled explicitly by the section if needed.

        if ($this->itemId) {
            $item = $this->modelClass::find($this->itemId);
            $item->update($data);
        } else {
            $this->modelClass::create($data);
        }

        $this->isOpen = false;
        $this->emit('refreshList');
    }

    public function setFieldValue($key, $value)
    {
        if (strpos($key, '.') !== false) {
            $parts = explode('.', $key);
            $ref =& $this->data;
            foreach ($parts as $part) {
                if (!isset($ref[$part]) || !is_array($ref[$part])) {
                    if ($part === end($parts)) break;
                    if (!isset($ref[$part]) || !is_array($ref[$part])) $ref[$part] = [];
                }
                $ref =& $ref[$part];
            }
            $ref = $value;
            return;
        }

        $this->data[$key] = $value;
    }

    public function render()
    {
        if ($this->modalView && view()->exists($this->modalView)) {
            return view($this->modalView);
        }

        return view('livewire.profile.fceer.modals.form');
    }
}
