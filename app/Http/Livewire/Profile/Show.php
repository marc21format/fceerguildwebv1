<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public User $user;
    public string $active = 'personal'; // personal | account | credentials | fceer
    protected $queryString = [
        'active' => ['except' => 'personal'],
    ];
    protected array $availableSections = ['personal', 'account', 'credentials', 'fceer'];

    public function mount($user = null)
    {
        $this->user = $user ? User::findOrFail($user) : Auth::user();
        $this->authorize('view', $this->user);

        // Prefer route segment (path) like /profile/{user}/{section}
        $sectionFromRoute = request()->route('section');
        $sectionFromQuery = request()->query('active');

        $section = $sectionFromRoute ?? $sectionFromQuery ?? $this->active;
        if (in_array($section, $this->availableSections)) {
            $this->active = $section;
        }
    }

    public function setActive(string $section)
    {
        if (! in_array($section, $this->availableSections)) {
            return;
        }

        $this->active = $section;
    }

    public function render()
    {
        return view('livewire.profile.show');
    }
}