# Profile Subsection Implementation Guide - Part 3: Blade Views & UI Patterns

This guide continues from Part 2 and covers the implementation of Blade templates and UI patterns.

---

## Section 4: Blade Views Implementation

### View 1: Main Index View (List/Table/Cards)

**File**: `resources/views/livewire/profile/fceer/subsections/committee_memberships/index.blade.php`

```blade
<div class="profile-section">
    <div class="profile-section-header">
        <div class="flex items-center gap-3">
            <div class="inline-flex items-center gap-2">
                <flux:icon name="users" class="w-5 h-5 text-gray-700 dark:text-gray-300" />
                <div class="profile-card-title">Committee Memberships</div>
            </div>

            <!-- View Toggle (Table/Cards) -->
            <div class="ml-4 inline-flex items-center rounded-md overflow-hidden border">
                <button type="button" wire:click.prevent="setView('table')"
                    class="px-2 py-1 text-sm transition inline-flex items-center justify-center rounded-l-md focus:outline-none {{ $view === 'table' ? 'bg-gray-100 text-gray-900 shadow ring-1 ring-gray-200 dark:bg-zinc-700 dark:text-white' : 'bg-white dark:bg-zinc-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-700' }}"
                    aria-label="Table view">
                    <flux:icon name="list" class="w-4 h-4" />
                </button>
                <button type="button" wire:click.prevent="setView('cards')"
                    class="px-2 py-1 text-sm transition inline-flex items-center justify-center rounded-r-md focus:outline-none {{ $view === 'cards' ? 'bg-gray-100 text-gray-900 shadow ring-1 ring-gray-200 dark:bg-zinc-700 dark:text-white' : 'bg-white dark:bg-zinc-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-700' }}"
                    aria-label="Card view">
                    <flux:icon name="gallery-vertical-end" class="w-4 h-4" />
                </button>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="inline-flex items-center space-x-2">
            @php
                $selectedRowNumbers = [];
                foreach($records as $loopIndex => $rec) {
                    $rk = (string) $rec->getKey();
                    if(in_array($rk, $selected ?? [])) {
                        $rowNum = ($records->firstItem() ?? 0) + ($loopIndex + 1) - 1;
                        $selectedRowNumbers[] = '#'.$rowNum;
                    }
                }
            @endphp
            @if(count($selected))
                <div class="text-sm text-indigo-600 dark:text-gray-300 mr-2">
                    {{ count($selected) }} record/s selected 
                    @if(!empty($selectedRowNumbers))
                        : <span class="font-mono text-sm">{{ implode(',', $selectedRowNumbers) }}</span>
                    @endif
                </div>
                <flux:button size="xs" tone="danger" class="ml-2 w-7 h-7 flex items-center justify-center text-sm" 
                    wire:click="deleteSelected" type="button" title="Delete selected">
                    <flux:icon name="trash" />
                    <span class="sr-only">Delete selected</span>
                </flux:button>
            @endif

            <flux:button size="xs" tone="neutral" class="w-7 h-7 flex items-center justify-center text-sm" 
                wire:click.prevent="create" type="button" title="Create">
                <flux:icon name="plus" />
            </flux:button>
            <flux:button size="xs" tone="neutral" class="w-7 h-7 flex items-center justify-center text-sm" 
                type="button" title="Archive" wire:click.prevent="openArchive">
                <flux:icon name="archive-restore" />
            </flux:button>
        </div>
    </div>

    @once
        <link rel="stylesheet" href="/css/reference-table.css">
        <script src="/js/reference-table.js" defer></script>
    @endonce

    @if($view === 'table')
        <!-- TABLE VIEW -->
        <div class="reference-table-container relative overflow-x-auto bg-white dark:bg-zinc-800 rounded shadow"
            x-data="{ selectedLocal: @entangle('selected') }"
            x-bind:class="{ 'has-selection': selectedLocal.length > 0 }">
            <table class="min-w-full divide-y">
                <thead class="bg-gray-50 dark:bg-zinc-900">
                    <tr>
                        <th class="px-2 py-2 text-center text-sm font-medium text-gray-500 dark:text-gray-300 w-12">
                            <span class="text-sm text-gray-400 header-number" x-cloak>#</span>
                            <input x-ref="selectAll" type="checkbox" @click.stop 
                                wire:model="selectAll" wire:change="$refresh" 
                                x-bind:checked="selectedLocal.length === {{ $records->count() }}" 
                                x-effect="$refs.selectAll.indeterminate = (selectedLocal.length > 0 && selectedLocal.length < {{ $records->count() }})" 
                                class="select-all form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" 
                                aria-label="Select all on page" x-cloak />
                        </th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Committee</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-300">Position</th>
                        <th class="px-2 py-2 text-center text-sm font-medium text-gray-500 dark:text-gray-300 w-20"></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($records as $item)
                        @php
                            $rowKey = $item->getKey();
                            $rowKeyStr = (string) $rowKey;
                            $isSelected = in_array($rowKeyStr, $selected ?? []);
                        @endphp
                        <tr class="group {{ $isSelected ? 'bg-gray-50 dark:bg-zinc-700 selected' : 'bg-white dark:bg-zinc-800' }}"
                            wire:key="profile-row-{{ $rowKeyStr }}"
                            data-row-key="{{ $rowKeyStr }}"
                            @click.prevent="if ($event.target.closest('button, input, a')) return; $wire.toggleRow('{{ $rowKeyStr }}')"
                            x-data="{ id: 'menu-{{ $rowKeyStr }}', top: 0, left: 0, 
                                init() { if (!Alpine.store('menu')) Alpine.store('menu', { openId: null }); }, 
                                get open() { return Alpine.store('menu').openId === this.id },
                                openMenu(ref) { 
                                    const rect = ref.getBoundingClientRect(); 
                                    this.top = Math.round(rect.bottom); 
                                    this.left = Math.round(rect.right - 220);
                                    Alpine.store('menu').openId = (Alpine.store('menu').openId === this.id ? null : this.id);
                                },
                                close() { if (Alpine.store('menu').openId === this.id) Alpine.store('menu').openId = null; } 
                            }">
                            <td class="px-2 py-2 text-sm text-gray-700 dark:text-gray-200">
                                <div class="flex items-center justify-center">
                                    <span class="w-6 text-sm text-gray-400 text-center row-number" x-cloak>{{ ($records->firstItem() ?? 0) + $loop->iteration - 1 }}</span>
                                    <input type="checkbox" @click.stop wire:model="selected" wire:change="$refresh" 
                                        wire:key="selected.{{ $rowKeyStr }}" value="{{ $rowKeyStr }}" 
                                        class="row-checkbox form-checkbox mx-auto accent-blue-600 dark:accent-gray-300" x-cloak />
                                </div>
                            </td>

                            <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                                {{ optional($item->committee)->name ?? ($item->committee_id ? $item->committee_id : '—') }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                                {{ optional($item->committeePosition)->name ?? ($item->committee_position_id ? $item->committee_position_id : '—') }}
                            </td>

                            <td class="w-20 px-2 py-2 text-sm text-gray-700 dark:text-gray-200">
                                <div class="flex items-center justify-center">
                                    <button x-cloak type="button" x-ref="actionBtn" 
                                        @click.stop="$wire.selectEnsure('{{ $rowKeyStr }}'); openMenu($refs.actionBtn)" 
                                        class="transition bg-transparent border-0 hover:bg-gray-50 dark:hover:bg-zinc-700/50 rounded px-2 py-1 flex items-center text-gray-400 dark:text-gray-300" 
                                        aria-label="Options">
                                        <flux:icon name="grip-vertical" class="w-4 h-4 text-current" />
                                    </button>

                                    <!-- Context Menu -->
                                    <div x-show="open" x-cloak @click.away="close()" 
                                         :style="`position: fixed; top: ${top}px; left: ${left}px;`"
                                         class="w-36 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded shadow-lg z-50">
                                        <div class="flex flex-col divide-y">
                                            <button type="button" @click.stop="close()" wire:click.prevent="relayShow({{ $item->getKey() }})" 
                                                class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-700">
                                                <flux:icon name="eye" class="w-4 h-4 text-gray-400 dark:text-gray-300" />
                                                <span>View</span>
                                            </button>

                                            <button type="button" @click.stop="close()" wire:click.prevent="relayEdit({{ $item->getKey() }})" 
                                                class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-700">
                                                <flux:icon name="pencil" class="w-4 h-4 text-gray-400 dark:text-gray-300" />
                                                <span>Edit</span>
                                            </button>

                                            <button type="button" @click.stop="close()" wire:click.prevent="relayDelete({{ $item->getKey() }})" 
                                                class="flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-gray-50 dark:hover:bg-zinc-700">
                                                <flux:icon name="trash" class="w-4 h-4 text-red-600 dark:text-red-400" />
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <!-- CARD VIEW -->
        <div class="grid grid-cols-1 {{ $records->count() > 1 ? 'md:grid-cols-2' : 'md:grid-cols-1' }} gap-4">
            @foreach($records as $item)
                @php
                    $rowKey = $item->getKey();
                    $rowKeyStr = (string) $rowKey;
                @endphp
                <div wire:key="card-row-{{ $rowKeyStr }}" 
                     class="bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded p-4 relative">
                    <div class="space-y-2">
                        <div class="font-medium text-gray-900 dark:text-white">
                            {{ optional($item->committee)->name ?? 'Committee #' . $item->committee_id }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">
                            Position: {{ optional($item->committeePosition)->name ?? $item->committee_position_id }}
                        </div>
                        @if($item->note)
                            <div class="text-sm text-gray-500 dark:text-gray-500 italic">
                                {{ Str::limit($item->note, 100) }}
                            </div>
                        @endif
                    </div>

                    <!-- Card Actions -->
                    <div class="absolute top-2 right-2">
                        <button type="button" @click.stop="$wire.relayShow({{ $item->getKey() }})"
                            class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1">
                            <flux:icon name="eye" class="w-4 h-4" />
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if($records->isEmpty())
        <p class="text-center py-4 text-gray-500 dark:text-gray-400">No entries yet.</p>
    @endif

    {{ $records->links() }}

    <!-- Include Modal Components -->
    <livewire:profile.fceer.subsections.committee-memberships.committee-memberships-form-modal 
        instance-key="App\\Models\\CommitteeMembership" 
        :key="'committee-memberships-form-'.$user->id" />
    <livewire:profile.fceer.subsections.committee-memberships.committee-memberships-confirm-modal 
        :key="'committee-memberships-confirm-'.$user->id" />
    <livewire:profile.fceer.subsections.committee-memberships.committee-memberships-archive 
        :key="'committee-memberships-archive-'.$user->id" />
    <livewire:profile.fceer.subsections.committee-memberships.committee-memberships-delete-modal 
        :key="'committee-memberships-delete-'.$user->id" />
    <livewire:profile.fceer.subsections.committee-memberships.committee-memberships-details-modal 
        :key="'committee-memberships-details-'.$user->id" />
    <livewire:profile.fceer.subsections.committee-memberships.committee-memberships-force-delete-modal 
        :key="'committee-memberships-force-delete-'.$user->id" />
    <livewire:profile.fceer.subsections.committee-memberships.committee-memberships-restore-modal 
        :key="'committee-memberships-restore-'.$user->id" />
</div>
```

**Key UI Patterns:**

1. **Header with View Toggle**: Switch between table and card layouts
2. **Checkbox Selection**: Header checkbox with indeterminate state
3. **Row Number Display**: Shows on hover, hidden when checkbox visible
4. **Context Menu**: Alpine.js powered dropdown with View/Edit/Delete
5. **Card Layout**: Responsive grid for mobile-friendly view
6. **Pagination**: Laravel's built-in pagination links
7. **Modal Includes**: All modals included at bottom with unique keys

---

### View 2: Form Modal

**File**: `resources/views/livewire/profile/fceer/subsections/committee_memberships/form-modal.blade.php`

```blade
<div>
    @if($open ?? false)
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <flux:modal name="committee-memberships-form" flyout class="w-11/12 max-w-2xl" 
                wire:model="open" @close="$set('open', false)">
                <form wire:submit.prevent="save">
                    <div class="space-y-6">
                        <div>
                            <flux:heading size="lg">
                                {{ $itemId ? 'Edit Committee Membership' : 'Add Committee Membership' }}
                            </flux:heading>
                        </div>

                        <!-- Duplicate Alert -->
                        @if($isDuplicate && $duplicateMessage)
                            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-md p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <flux:icon name="exclamation-triangle" class="w-5 h-5 text-yellow-400" />
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-yellow-700 dark:text-yellow-300">
                                            {{ $duplicateMessage }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Form Fields -->
                        <div class="space-y-4">
                            <flux:field>
                                <flux:label required>Committee</flux:label>
                                <flux:select wire:model.live="state.committee_id">
                                    <option value="">Select a committee...</option>
                                    @foreach($committees as $committee)
                                        <option value="{{ $committee->id }}">{{ $committee->name }}</option>
                                    @endforeach
                                </flux:select>
                                <flux:error name="state.committee_id" />
                            </flux:field>

                            <flux:field>
                                <flux:label required>Position</flux:label>
                                <flux:select wire:model.live="state.committee_position_id">
                                    <option value="">Select a position...</option>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </flux:select>
                                <flux:error name="state.committee_position_id" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Note</flux:label>
                                <flux:textarea wire:model="state.note" rows="3" />
                                <flux:error name="state.note" />
                            </flux:field>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-2">
                            <flux:button wire:click="$set('open', false)" type="button">Cancel</flux:button>
                            <flux:button type="submit" variant="primary">
                                {{ $itemId ? 'Update' : 'Save' }}
                            </flux:button>
                        </div>
                    </div>
                </form>
            </flux:modal>
        </div>
    @endif
</div>
```

**Key Features:**
- **Dynamic heading**: "Add" vs "Edit" based on $itemId
- **Duplicate alert**: Yellow warning banner when duplicate detected
- **wire:model.live**: Triggers duplicate check on field change
- **Flux components**: Uses Flux UI components for consistent styling
- **Validation errors**: `<flux:error>` displays validation messages

---

### View 3: Confirm Modal (Hidden)

**File**: `resources/views/livewire/profile/fceer/subsections/committee_memberships/confirm-changes-modal.blade.php`

```blade
<div>
    {{-- This modal is invisible - it only handles the save logic --}}
    {{-- The FormModal dispatches to this component via scoped event --}}
</div>
```

**Note**: Confirm modal has no UI - it's a background handler for the scoped event.

---

### View 4: Details Modal

**File**: `resources/views/livewire/profile/fceer/subsections/committee_memberships/details-modal.blade.php`

```blade
<div>
    @if($open ?? false)
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <flux:modal name="committee-membership-details" flyout class="w-11/12 max-w-2xl" 
                wire:model="open" @close="$set('open', false)">
                <div class="space-y-6">
                    <!-- Main Heading -->
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Committee Membership Details</h2>
                        <div class="mt-3 mb-4 border-b border-gray-200 dark:border-zinc-700"></div>
                    </div>

                    <div class="space-y-3">
                        <!-- Section: Membership Details -->
                        <h4 class="text-base font-semibold text-gray-800 dark:text-gray-200 mb-3">Membership Details</h4>
                        @foreach($fields as $f)
                            @php
                                $key = $f['key'];
                                if (in_array($key, ['created_at','updated_at'])) continue;
                                $val = $details[$key] ?? null;
                                $isEmpty = is_null($val) || trim((string)$val) === '' || (string)$val === '—';
                            @endphp

                            @if(! $isEmpty)
                                <div class="grid grid-cols-3 gap-4 items-start">
                                    <div class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                        {{ $f['label'] ?? ucfirst($key) }}
                                    </div>
                                    <div class="col-span-2 text-sm text-gray-800 dark:text-gray-200">
                                        {{ $val }}
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <!-- Section: Metadata -->
                        <div class="pt-4 border-t">
                            <h4 class="text-base font-semibold text-gray-800 dark:text-gray-200 mb-3">Metadata</h4>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-sm font-medium text-gray-600 dark:text-gray-400">Created</div>
                                <div class="col-span-2 text-sm text-gray-800 dark:text-gray-200">
                                    {{ $details['_meta']['created_at_human'] ?? ($details['_meta']['created_at'] ?? '—') }} 
                                    by {{ $details['_meta']['created_by'] ?? '—' }}
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mt-2">
                                <div class="text-sm font-medium text-gray-600 dark:text-gray-400">Updated</div>
                                <div class="col-span-2 text-sm text-gray-800 dark:text-gray-200">
                                    {{ $details['_meta']['updated_at_human'] ?? ($details['_meta']['updated_at'] ?? '—') }} 
                                    by {{ $details['_meta']['updated_by'] ?? '—' }}
                                </div>
                            </div>
                        </div>

                        <!-- Section: Recent Changes -->
                        @if(! empty($details['_meta']['activity']))
                            <div class="pt-4 border-t">
                                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-200 mb-3">Recent changes</h4>
                                <div class="space-y-2 max-h-72 overflow-auto text-sm text-gray-700 dark:text-gray-300">
                                    @foreach($details['_meta']['activity'] as $a)
                                        @include('livewire.reference.partials.activity-row', ['a' => $a])
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="flex justify-end">
                        <flux:button wire:click="$set('open', false)">Close</flux:button>
                    </div>
                </div>
            </flux:modal>
        </div>
    @endif
</div>
```

**Key Features:**
- **Text hierarchy**: Main heading (text-2xl font-bold), section headers (text-base font-semibold), body text (text-sm)
- **Three sections**: Membership Details, Metadata, Recent changes
- **Grid layout**: 3-column grid for label/value pairs
- **Scrollable activity**: max-h-72 overflow-auto for activity history

---

### View 5: Archive Modal

**File**: `resources/views/livewire/profile/fceer/subsections/committee_memberships/archive-modal.blade.php`

```blade
<div>
    @if($open ?? false)
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <flux:modal name="committee-memberships-archive" flyout class="w-11/12 max-w-4xl" 
                wire:model="open" @close="$set('open', false)">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Archive - Deleted Committee Memberships</flux:heading>
                    </div>

                    @if($items->isNotEmpty())
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y">
                                <thead class="bg-gray-50 dark:bg-zinc-900">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Committee</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Position</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Deleted By</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Deleted At</th>
                                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-500 w-32">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach($items as $item)
                                        <tr class="bg-white dark:bg-zinc-800">
                                            <td class="px-4 py-2 text-sm">
                                                {{ optional($item->committee)->name ?? $item->committee_id }}
                                            </td>
                                            <td class="px-4 py-2 text-sm">
                                                {{ optional($item->committeePosition)->name ?? $item->committee_position_id }}
                                            </td>
                                            <td class="px-4 py-2 text-sm">
                                                {{ optional($item->deletedBy)->name ?? '—' }}
                                            </td>
                                            <td class="px-4 py-2 text-sm">
                                                {{ $item->deleted_at?->format('Y-m-d H:i') ?? '—' }}
                                            </td>
                                            <td class="px-4 py-2 text-sm text-center">
                                                <div class="flex items-center justify-center gap-2">
                                                    <flux:button size="xs" wire:click="restore({{ $item->id }})" type="button">
                                                        Restore
                                                    </flux:button>
                                                    <flux:button size="xs" tone="danger" 
                                                        wire:click="forceDelete({{ $item->id }})" type="button">
                                                        Delete
                                                    </flux:button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $items->links() }}
                    @else
                        <p class="text-center py-4 text-gray-500">No deleted records found.</p>
                    @endif

                    <div class="flex justify-end">
                        <flux:button wire:click="close">Close</flux:button>
                    </div>
                </div>
            </flux:modal>
        </div>
    @endif
</div>
```

**Key Features:**
- **Full table layout**: Shows deleted records with metadata
- **Action buttons**: Restore and Force Delete per row
- **Pagination**: For large archive lists
- **Empty state**: Message when no deleted records

---

### Views 6-8: Delete, Restore, Force-Delete Modals

These follow the same compact pattern. Here's the **Delete Modal** as an example:

**File**: `resources/views/livewire/profile/fceer/subsections/committee_memberships/delete-modal.blade.php`

```blade
<div>
    @if($open ?? false)
        <div class="fixed inset-0 bg-black/20 backdrop-blur-sm flex items-center justify-center z-50">
            <flux:modal name="committee-memberships-delete" class="w-11/12 max-w-md" 
                wire:model="open" @close="$set('open', false)">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Confirm delete</flux:heading>
                    <flux:text>Are you sure you want to delete the following record(s)? This action cannot be undone.</flux:text>
                    @if(!empty($labels))
                        <ul class="mt-3 list-disc list-inside text-sm text-gray-700 dark:text-gray-200">
                            @foreach($labels as $lab)
                                <li>{{ $lab }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="flex justify-end space-x-2">
                    <flux:button wire:click="$set('open', false)">Cancel</flux:button>
                    <flux:button variant="danger" wire:click="confirm">Delete</flux:button>
                </div>
            </div>
            </flux:modal>
        </div>
    @endif
</div>
```

**Restore Modal** is identical except:
- Heading: "Confirm restore"
- Text: "Are you sure you want to restore the selected record(s)?"
- Button: `variant="primary"` and label "Restore"

**Force-Delete Modal** is identical except:
- Heading: "Confirm permanent delete"
- Text: "Are you sure you want to permanently delete the following record(s)? This cannot be undone."
- Button: `variant="danger"` and label "Delete permanently"

---

## UI/UX Best Practices

### 1. **Consistent Spacing**
- Use `space-y-6` for modal sections
- Use `space-y-3` or `space-y-4` for form fields
- Use `gap-2` or `gap-4` for button groups

### 2. **Dark Mode Support**
- Always provide dark mode classes: `dark:bg-zinc-800`, `dark:text-gray-200`
- Use neutral gray palette for consistency

### 3. **Accessibility**
- Use `aria-label` for icon-only buttons
- Include `<span class="sr-only">` for screen readers
- Proper form labels with `<flux:label>`

### 4. **Loading States**
- Livewire automatically adds loading indicators
- Use `wire:loading` directive for custom spinners if needed

### 5. **Responsive Design**
- Cards auto-adjust columns: `md:grid-cols-2` for multiple items
- Tables scroll horizontally on mobile: `overflow-x-auto`
- Modal widths adjust: `w-11/12` with `max-w-*`

---

## Summary of Part 3

At this stage, you have implemented:

✅ **Main Index View** - Table and card layouts with selection
✅ **Form Modal** - Dynamic form with duplicate detection
✅ **Details Modal** - Three-section layout with activity history
✅ **Archive Modal** - Table view of soft-deleted records
✅ **Delete/Restore/Force-Delete Modals** - Compact confirmation dialogs
✅ **UI Best Practices** - Consistent styling, dark mode, accessibility

**Next**: Part 4 will cover service provider registration, policies, and the complete event flow walkthrough.
