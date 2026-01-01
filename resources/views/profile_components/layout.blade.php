<div class="profile-section">
    <div class="profile-section-header">
        <div class="flex items-center gap-3">
            <div class="inline-flex items-center gap-2">
                <flux:icon name="list" class="w-5 h-5 text-gray-700 dark:text-gray-300" />
                <div class="profile-card-title">{{ $title ?? ($label ?? 'Profile Records') }}</div>
            </div>

            <div class="ml-4 inline-flex items-center rounded-md overflow-hidden border">
                <button type="button" wire:click.prevent="$set('view','table')"
                    class="px-2 py-1 text-sm inline-flex items-center justify-center rounded-l-md {{ $view === 'table' ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600' }}"
                    aria-label="Table view">
                    <flux:icon name="list" class="w-4 h-4" />
                </button>
                <button type="button" wire:click.prevent="$set('view','cards')"
                    class="px-2 py-1 text-sm inline-flex items-center justify-center rounded-r-md {{ $view === 'cards' ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600' }}"
                    aria-label="Card view">
                    <flux:icon name="gallery-vertical-end" class="w-4 h-4" />
                </button>
            </div>
        </div>

        <div class="inline-flex items-center space-x-2">
            @php
                $selectedRowNumbers = [];
                if (isset($selected) && is_array($selected)) {
                    foreach($items as $loopIndex => $rec) {
                        if (in_array((string)$rec->getKey(), $selected)) {
                            $selectedRowNumbers[] = $loopIndex + 1;
                        }
                    }
                }
            @endphp
            @if(!empty($selected) && count($selected))
                <div class="text-sm text-indigo-600 mr-2">{{ count($selected) }} selected @if(!empty($selectedRowNumbers))— <span class="font-mono text-sm">({{ implode(',', $selectedRowNumbers) }})</span>@endif</div>
                <flux:button size="xs" tone="danger" class="ml-2" wire:click="deleteSelected" type="button" title="Delete selected">
                    <flux:icon name="trash" />
                </flux:button>
            @endif

            <flux:button size="xs" tone="neutral" class="w-7 h-7 flex items-center justify-center text-sm" wire:click.prevent="create" type="button" title="Create">
                <flux:icon name="plus" />
            </flux:button>
            <flux:button size="xs" tone="neutral" class="w-7 h-7 flex items-center justify-center text-sm" type="button" title="Archive" wire:click.prevent="openArchive">
                <flux:icon name="archive-restore" />
            </flux:button>
        </div>
    </div>

    @once
        <link rel="stylesheet" href="/css/reference-table.css">
        <script src="/js/reference-table.js" defer></script>
    @endonce

    @if($view === 'table')
        <div class="reference-table-container relative overflow-x-auto bg-white dark:bg-zinc-800 rounded shadow"
            x-data="{ selectedLocal: @entangle('selected') }"
            x-bind:class="{ 'has-selection': selectedLocal.length > 0 }"
            x-on:mouseenter="$store.rowHover.hovered = 'table'"
            x-on:mouseleave="$store.rowHover.hovered = null">
            @include('profile_components.table', ['items' => $items, 'fields' => $fields, 'modelClass' => $modelClass ?? null])
        </div>
    @else
        <div class="grid grid-cols-1 {{ $items->count() > 1 ? 'md:grid-cols-2' : 'md:grid-cols-1' }} gap-4" x-data="{ selectedLocal: @entangle('selected') }">
            @foreach($items as $item)
                @php $rowKey = $item->getKey(); $rowKeyStr = (string) $rowKey; @endphp
                <div wire:key="card-row-{{ $rowKeyStr }}" class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4 relative">
                    @include('profile_components.card', ['item' => $item, 'fields' => $fields, 'title' => null])
                    <div class="absolute top-2 right-2">
                        <flux:button size="xs" tone="neutral" wire:click.prevent="$emit('showProfileRecord', ['id' => {{ $rowKey }}, 'modelClass' => '{{ $modelClass ?? '' }}'])">Details</flux:button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <livewire:profile_components.modal.profile-form-modal :modelClass="$modelClass" :key="'profile-form-'.($profileId ?? 'global')" />
    <livewire:profile_components.modal.profile-delete-modal :modelClass="$modelClass" :key="'profile-delete-'.($profileId ?? 'global')" />
    <livewire:profile_components.modal.profile-force-delete-modal :modelClass="$modelClass" :key="'profile-force-delete-'.($profileId ?? 'global')" />
    <livewire:profile_components.modal.profile-archive-modal :modelClass="$modelClass" :key="'profile-archive-'.($profileId ?? 'global')" />
    <livewire:profile_components.modal.profile-restore-modal :modelClass="$modelClass" :key="'profile-restore-'.($profileId ?? 'global')" />
    <livewire:profile_components.modal.profile-details-modal :modelClass="$modelClass" :key="'profile-details-'.($profileId ?? 'global')" />
    <livewire:profile_components.modal.profile-confirm-changes-modal :modelClass="$modelClass" :key="'profile-confirm-'.($profileId ?? 'global')" />
</div>
