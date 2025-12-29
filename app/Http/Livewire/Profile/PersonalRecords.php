<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class PersonalRecords extends Component
{
    public User $user;
    public string $first_name = '';
    public string $middle_name = '';
    public string $suffix_name = '';
    public string $lived_name = '';
    public string $generational_suffix = '';
    public string $phone_number = '';
    public string $birthday = '';
    public string $sex = '';
    public int $address_id = 0;
    public string $viewMode = 'cards';

    public function mount(User $user)
    {
        $this->user = $user;
        $this->authorize('update', $this->user);
        $profile = $this->user->profile;
        if ($profile) {
            $this->first_name = $profile->first_name ?? '';
            $this->middle_name = $profile->middle_name ?? '';
            $this->suffix_name = $profile->suffix_name ?? '';
            $this->lived_name = $profile->lived_name ?? '';
            $this->generational_suffix = $profile->generational_suffix ?? '';
            $this->phone_number = $profile->phone_number ?? '';
            $this->birthday = $profile->birthday ? $profile->birthday->format('Y-m-d') : '';
            $this->sex = $profile->sex ?? '';
            $this->address_id = $profile->address_id ?? 0;
        }
    }

    public function save()
    {
        $this->validate([
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'suffix_name' => 'nullable|string|max:50',
            'lived_name' => 'nullable|string|max:100',
            'generational_suffix' => 'nullable|string|max:50',
            'phone_number' => 'nullable|string|max:20',
            'birthday' => 'required|date',
            'sex' => 'required|in:M,F,O',
            'address_id' => 'required|exists:addresses,id',
        ]);

        $this->user->profile()->updateOrCreate(
            ['user_id' => $this->user->id],
            [
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'suffix_name' => $this->suffix_name,
                'lived_name' => $this->lived_name,
                'generational_suffix' => $this->generational_suffix,
                'phone_number' => $this->phone_number,
                'birthday' => $this->birthday,
                'sex' => $this->sex,
                'address_id' => $this->address_id,
            ]
        );
        session()->flash('message', 'Personal info saved.');
    }

    public function toggleView(string $mode)
    {
        if (in_array($mode, ['cards', 'table'])) {
            $this->viewMode = $mode;
        }
    }

    public function openEdit()
    {
        $cfg = config('profile.personal');
        $model = $cfg['model'] ?? null;
        $fieldsCfg = $cfg['fields'] ?? [];

        $fields = [];
        foreach ($fieldsCfg as $key => $f) {
            $field = [
                'key' => $key,
                'label' => $f['label'] ?? ucfirst(str_replace('_', ' ', $key)),
                'type' => $f['type'] ?? 'text',
                'placeholder' => $f['placeholder'] ?? null,
                'options' => $f['options'] ?? null,
                'rules' => '',
            ];

            $rules = [];
            if (isset($f['required']) && $f['required']) $rules[] = 'required';
            if (isset($f['max'])) $rules[] = 'max:'.$f['max'];
            if (isset($f['min'])) $rules[] = 'min:'.$f['min'];
            if ($rules) $field['rules'] = implode('|', $rules);

            $fields[] = $field;
        }

        $itemId = $this->user->profile->id ?? null;

        // Bubble request to parent which will forward to the mounted personal modal instance
        $this->emitUp('requestOpenProfileModal', [
            'instanceKey' => $model,
            'modelClass' => $model,
            'fields' => $fields,
            'userId' => $this->user->id,
            'itemId' => $itemId,
        ]);
    }

    protected $listeners = [
        'requestOpenProfileModal' => 'forwardOpenProfileModal',
    ];

    public function forwardOpenProfileModal($params)
    {
        $this->emitTo('profile.personal-form-modal', 'openPersonalModal', $params);
    }

    public function render()
    {
        return view('livewire.profile.personal-records');
    }
}