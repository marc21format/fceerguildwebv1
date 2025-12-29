<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class AccountRecords extends Component
{
    public User $user;
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $viewMode = 'cards';

    public function mount(User $user)
    {
        $this->user = $user;
        $this->authorize('update', $this->user);
    }

    protected $listeners = [
        'requestOpenProfileModal' => 'forwardOpenProfileModal',
    ];

    public function forwardOpenProfileModal($params)
    {
        $this->emitTo('profile.account-form-modal', 'openAccountModal', $params);
    }

    public function updatePassword()
    {
        if ($this->user->id !== Auth::id()) {
            $this->addError('password', 'You can only change your own password.');
            return;
        }

        $this->validate([
            'current_password' => ['required', 'string', 'current_password'],
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
        ]);

        $this->user->update(['password' => $this->password]);
        $this->reset('current_password', 'password', 'password_confirmation');
        session()->flash('message', 'Password updated.');
    }

    public function toggleView(string $mode)
    {
        if (in_array($mode, ['cards', 'table'])) {
            $this->viewMode = $mode;
        }
    }

    public function render()
    {
        return view('livewire.profile.account-records');
    }
}