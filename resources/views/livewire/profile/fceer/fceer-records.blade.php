<div class="profile-container">
    <h3 class="profile-title">FCEER Records</h3>

    @foreach($sections as $key => $section)
        <div class="mt-6">
            <livewire:profile-crud :modelClass="$section['model']" :fields="$section['fields']" :user="$user" title="{{ $section['label'] }}" :modal-view="'livewire.profile.fceer.modals.'.$key" wire:key="{{ $key.'-'.$user->id }}" />
        </div>
    @endforeach
    {{-- modal instance for fceer area --}}
    {{-- Each `profile-crud` now renders its own `profile-form-modal` instance. --}}
</div>
