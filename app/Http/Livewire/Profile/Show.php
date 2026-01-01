<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use App\Models\ProfilePicture;
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
    
    protected $listeners = ['refreshSidebarAvatar' => 'refreshUser'];

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

    public function refreshUser()
    {
        $this->user = User::findOrFail($this->user->id);
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
        $currentPicture = ProfilePicture::where('user_id', $this->user->id)
            ->where('is_current', true)
            ->with('attachment')
            ->first();

        return view('livewire.profile.show', [
            'user' => $this->user,
            'active' => $this->active,
            'currentPicture' => $currentPicture,
        ]);
    }
}