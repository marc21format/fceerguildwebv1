<div class="profile-container">
    <div class="flex items-center justify-between">
        <h3 class="profile-title">Personal Information</h3>
        <div class="flex items-center gap-2">
            <button wire:click.prevent="toggleView('cards')" :class="''" class="px-2 py-1 rounded-md text-sm bg-white/5">Cards</button>
            <button wire:click.prevent="toggleView('table')" :class="''" class="px-2 py-1 rounded-md text-sm bg-white/5">Table</button>
            <button wire:click.prevent="openEdit" title="Edit" class="p-2 rounded-md text-gray-500 hover:bg-white/5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-8.486 8.486a1 1 0 01-.464.263l-4 1a1 1 0 01-1.213-1.213l1-4a1 1 0 01.263-.464l8.486-8.486z"/></svg>
            </button>
        </div>
    </div>

    @if($viewMode === 'table')
        <div class="mt-4 overflow-auto">
            <table class="w-full text-left">
                <tbody>
                    <tr><th class="py-2">First Name</th><td class="py-2">{{ $first_name ?? '-' }}</td></tr>
                    <tr><th class="py-2">Middle Name</th><td class="py-2">{{ $middle_name ?? '-' }}</td></tr>
                    <tr><th class="py-2">Suffix Name</th><td class="py-2">{{ $suffix_name ?? '-' }}</td></tr>
                    <tr><th class="py-2">Lived Name</th><td class="py-2">{{ $lived_name ?? '-' }}</td></tr>
                    <tr><th class="py-2">Generational Suffix</th><td class="py-2">{{ $generational_suffix ?? '-' }}</td></tr>
                    <tr><th class="py-2">Phone Number</th><td class="py-2">{{ $phone_number ?? '-' }}</td></tr>
                    <tr><th class="py-2">Birthday</th><td class="py-2">{{ $birthday ?? '-' }}</td></tr>
                    <tr><th class="py-2">Sex</th><td class="py-2">@if(isset($sex)) @if($sex === 'M') Male @elseif($sex === 'F') Female @else Other @endif @else - @endif</td></tr>
                    <tr><th class="py-2">Address ID</th><td class="py-2">{{ $address_id ?? '-' }}</td></tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="grid gap-4">
        <div>
            <div class="profile-label">First Name</div>
            <div class="profile-value">{{ $first_name ?? '-' }}</div>
        </div>

        <div>
            <div class="profile-label">Middle Name</div>
            <div class="profile-value">{{ $middle_name ?? '-' }}</div>
        </div>

        <div>
            <div class="profile-label">Suffix Name</div>
            <div class="profile-value">{{ $suffix_name ?? '-' }}</div>
        </div>

        <div>
            <div class="profile-label">Lived Name</div>
            <div class="profile-value">{{ $lived_name ?? '-' }}</div>
        </div>

        <div>
            <div class="profile-label">Generational Suffix</div>
            <div class="profile-value">{{ $generational_suffix ?? '-' }}</div>
        </div>

        <div>
            <div class="profile-label">Phone Number</div>
            <div class="profile-value">{{ $phone_number ?? '-' }}</div>
        </div>

        <div>
            <div class="profile-label">Birthday</div>
            <div class="profile-value">{{ $birthday ?? '-' }}</div>
        </div>

        <div>
            <div class="profile-label">Sex</div>
            <div class="profile-value">
                @if(isset($sex))
                    @if($sex === 'M') Male @elseif($sex === 'F') Female @else Other @endif
                @else
                    -
                @endif
            </div>
        </div>

        <div>
            <div class="profile-label">Address ID</div>
            <div class="profile-value">{{ $address_id ?? '-' }}</div>
        </div>
    </div>
    @endif
</div>
<livewire:profile.personal-form-modal :key="'personal-form-modal-'.$user->id" />
