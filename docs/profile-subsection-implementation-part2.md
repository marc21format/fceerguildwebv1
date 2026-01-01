# Profile Subsection Implementation Guide - Part 2: Livewire Components & Blade Views

This guide continues from Part 1 and covers the implementation of Livewire components and Blade templates.

---

## Section 3: Livewire Components Implementation

### Component 1: Main List Component

**File**: `app/Http/Livewire/Profile/Fceer/Subsections/CommitteeMemberships/CommitteeMemberships.php`

```php
<?php

namespace App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships;

use App\Models\User;
use App\Models\CommitteeMembership;
use Livewire\Component;

class CommitteeMemberships extends Component
{
    public User $user;
    public string $view = 'table';
    public array $selected = [];
    public bool $selectAll = false;

    protected $listeners = [
        'savedCredential' => 'handleSavedCredential',
        'refreshList' => '$refresh',
        'refreshCommitteeMembershipsArchive' => '$refresh',
        'refreshReferenceTable' => '$refresh',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->authorize('view', $this->user);
    }

    public function handleSavedCredential()
    {
        $this->selected = [];
        $this->selectAll = false;
        $this->emit('refreshList');
    }

    public function setView(string $view)
    {
        $this->view = $view;
    }

    public function create()
    {
        $this->authorize('manageCommitteeMemberships', $this->user);

        $this->emit('requestOpenProfileModal', [
            'instanceKey' => CommitteeMembership::class,
            'modalView' => null,
            'userId' => $this->user->id,
        ]);
    }

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            $this->selected = CommitteeMembership::where('user_id', $this->user->id)
                ->pluck('id')
                ->map(fn($id) => (string)$id)
                ->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function toggleRow($key)
    {
        if (in_array($key, $this->selected)) {
            $this->selected = array_diff($this->selected, [$key]);
        } else {
            $this->selected[] = $key;
        }
    }

    public function selectEnsure($key)
    {
        if (!in_array($key, $this->selected)) {
            $this->selected[] = $key;
        }
    }

    public function relayEdit($itemId)
    {
        $this->authorize('manageCommitteeMemberships', $this->user);

        $this->emit('requestOpenProfileModal', [
            'instanceKey' => CommitteeMembership::class,
            'itemId' => $itemId,
            'userId' => $this->user->id,
        ]);
    }

    public function relayShow($itemId)
    {
        $this->emit('showCommitteeMemberships', $itemId);
    }

    public function relayDelete($itemId)
    {
        $this->authorize('manageCommitteeMemberships', $this->user);
        $this->emit('openCommitteeMembershipsDeleteModal', (int) $itemId);
    }

    public function openArchive()
    {
        $this->emit('openCommitteeMembershipsArchive');
    }

    public function deleteSelected()
    {
        $this->authorize('manageCommitteeMemberships', $this->user);

        $ids = array_values(array_map('strval', (array) $this->selected));
        $this->emit('openCommitteeMembershipsDeleteModal', ['ids' => $ids]);
    }

    public function render()
    {
        $records = CommitteeMembership::where('user_id', $this->user->id)
            ->orderBy('id', 'desc')
            ->paginate(15);
            
        return view('livewire.profile.fceer.subsections.committee_memberships.index', compact('records'));
    }
}
```

**Key Points:**
- **Public $user**: Injected via mount, used for scoping queries
- **$view**: Toggles between 'table' and 'cards' layout
- **$selected**: Array of selected IDs for bulk operations
- **Listeners**: Responds to 'savedCredential' to refresh after CRUD
- **Authorization**: Calls policy methods before sensitive actions
- **Relay methods**: Bridge between UI clicks and modal opens

---

### Component 2: Form Modal

**File**: `app/Http/Livewire/Profile/Fceer/Subsections/CommitteeMemberships/CommitteeMembershipsFormModal.php`

```php
<?php

namespace App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships;

use Livewire\Component;
use App\Models\CommitteeMembership;
use App\Models\Committee;
use App\Models\CommitteePosition;

class CommitteeMembershipsFormModal extends Component
{
    public bool $open = false;
    public ?int $itemId = null;
    public ?int $userId = null;
    
    // Form fields
    public $state = [
        'committee_id' => null,
        'committee_position_id' => null,
        'note' => '',
    ];
    
    public bool $isDuplicate = false;
    public ?string $duplicateMessage = null;

    protected $listeners = [
        'requestOpenProfileModal' => 'open',
    ];

    public function mount()
    {
        // Initialize empty state
    }

    public function open(array $params = [])
    {
        // Extract userId from params
        $this->userId = $params['userId'] ?? null;
        
        // Check authorization
        if ($this->userId) {
            $user = \App\Models\User::findOrFail($this->userId);
            $this->authorize('manageCommitteeMemberships', $user);
        }

        // Check if editing existing item
        $this->itemId = $params['itemId'] ?? null;

        if ($this->itemId) {
            // Load existing record
            $item = CommitteeMembership::findOrFail($this->itemId);
            $this->state = [
                'committee_id' => $item->committee_id,
                'committee_position_id' => $item->committee_position_id,
                'note' => $item->note ?? '',
            ];
            
            // Capture user_id from existing item
            $this->userId = $item->user_id;
        } else {
            // Reset for new record
            $this->reset(['state', 'isDuplicate', 'duplicateMessage']);
        }

        $this->open = true;
    }

    public function updatedStateCommitteeId()
    {
        $this->checkDuplicate();
    }

    public function updatedStateCommitteePositionId()
    {
        $this->checkDuplicate();
    }

    protected function checkDuplicate()
    {
        $this->isDuplicate = false;
        $this->duplicateMessage = null;

        if (!$this->state['committee_id'] || !$this->state['committee_position_id'] || !$this->userId) {
            return;
        }

        $query = CommitteeMembership::withTrashed()
            ->where('user_id', $this->userId)
            ->where('committee_id', $this->state['committee_id'])
            ->where('committee_position_id', $this->state['committee_position_id']);

        // Exclude current item if editing
        if ($this->itemId) {
            $query->where('id', '!=', $this->itemId);
        }

        $duplicate = $query->first();

        if ($duplicate) {
            $this->isDuplicate = true;
            
            $committeeName = optional($duplicate->committee)->name ?? 'Committee #' . $duplicate->committee_id;
            $positionName = optional($duplicate->committeePosition)->name ?? 'Position #' . $duplicate->committee_position_id;
            
            if ($duplicate->trashed()) {
                $this->duplicateMessage = "This membership ({$committeeName} — {$positionName}) was previously deleted. Saving will restore it.";
            } else {
                $this->duplicateMessage = "This membership ({$committeeName} — {$positionName}) already exists.";
            }
        }
    }

    public function setField($key, $value)
    {
        $this->state[$key] = $value;
    }

    public function save()
    {
        // Validate
        $this->validate([
            'state.committee_id' => 'required|exists:committees,id',
            'state.committee_position_id' => 'required|exists:committee_positions,id',
            'state.note' => 'nullable|string|max:1000',
        ]);

        // Dispatch to confirm modal with scoped event name
        $this->dispatch('confirmCommitteeMembershipSave', [
            'itemId' => $this->itemId,
            'state' => $this->state,
            'userId' => $this->userId,
        ]);

        $this->open = false;
    }

    public function render()
    {
        $committees = Committee::orderBy('name')->get();
        $positions = CommitteePosition::orderBy('name')->get();
        
        return view('livewire.profile.fceer.subsections.committee_memberships.form-modal', [
            'committees' => $committees,
            'positions' => $positions,
        ]);
    }
}
```

**Key Points:**
- **$state array**: Holds form values (Livewire wire:model binding)
- **$userId**: Captured from params (crucial for scoping)
- **$itemId**: Null for create, populated for edit
- **checkDuplicate()**: Uses `withTrashed()` to detect soft-deleted duplicates
- **Scoped event**: `confirmCommitteeMembershipSave` (unique per subsection)
- **Authorization**: Checks policy before opening modal

---

### Component 3: Confirm Modal (Scoped Save Handler)

**File**: `app/Http/Livewire/Profile/Fceer/Subsections/CommitteeMemberships/CommitteeMembershipsConfirmModal.php`

```php
<?php

namespace App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships;

use Livewire\Component;
use App\Models\CommitteeMembership;
use Masmerise\Toaster\Toastable;

class CommitteeMembershipsConfirmModal extends Component
{
    use Toastable;

    public bool $open = false;
    public ?int $itemId = null;
    public array $state = [];
    public ?int $userId = null;

    protected $listeners = [
        'confirmCommitteeMembershipSave' => 'handleSave',
    ];

    public function handleSave(array $payload)
    {
        $this->itemId = $payload['itemId'] ?? null;
        $this->state = $payload['state'] ?? [];
        $this->userId = $payload['userId'] ?? null;

        if (!$this->userId) {
            $this->error('User ID is missing.');
            return;
        }

        // Check for existing soft-deleted duplicate
        $existingQuery = CommitteeMembership::withTrashed()
            ->where('user_id', $this->userId)
            ->where('committee_id', $this->state['committee_id'])
            ->where('committee_position_id', $this->state['committee_position_id']);

        if ($this->itemId) {
            $existingQuery->where('id', '!=', $this->itemId);
        }

        $existing = $existingQuery->first();

        if ($existing && $existing->trashed()) {
            // Restore soft-deleted record
            $existing->restore();
            $existing->update($this->state);
            $existing->updated_by_id = auth()->id();
            $existing->save();

            if (function_exists('activity')) {
                activity()->performedOn($existing)->causedBy(auth()->user())->log('restored_and_updated');
            }

            $this->success('Membership restored and updated.');
        } elseif ($this->itemId) {
            // Update existing
            $model = CommitteeMembership::findOrFail($this->itemId);
            $model->fill($this->state);
            $model->updated_by_id = auth()->id();
            $model->save();

            if (function_exists('activity')) {
                activity()->performedOn($model)->causedBy(auth()->user())->log('updated');
            }

            $this->success('Membership updated.');
        } else {
            // Create new
            $model = new CommitteeMembership();
            $model->fill($this->state);
            $model->user_id = $this->userId;
            $model->created_by_id = auth()->id();
            $model->updated_by_id = auth()->id();
            $model->save();

            if (function_exists('activity')) {
                activity()->performedOn($model)->causedBy(auth()->user())->log('created');
            }

            $this->success('Membership created.');
        }

        // Notify other components to refresh
        $this->dispatch('savedCredential');
        $this->emit('refreshList');
        $this->emit('refreshReferenceTable');
    }

    public function render()
    {
        return view('livewire.profile.fceer.subsections.committee_memberships.confirm-changes-modal');
    }
}
```

**Key Points:**
- **Scoped listener**: `confirmCommitteeMembershipSave` (matches FormModal dispatch)
- **Duplicate handling**: Restores soft-deleted if exists, otherwise creates new
- **Audit tracking**: Sets created_by_id and updated_by_id
- **Activity logging**: Logs 'created', 'updated', or 'restored_and_updated'
- **Refresh events**: Emits 'savedCredential' to refresh list

---

### Component 4: Details Modal

**File**: `app/Http/Livewire/Profile/Fceer/Subsections/CommitteeMemberships/CommitteeMembershipsDetailsModal.php`

```php
<?php

namespace App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships;

use Livewire\Component;
use App\Models\CommitteeMembership;

class CommitteeMembershipsDetailsModal extends Component
{
    public bool $open = false;
    public array $fields = [];
    public array $details = [];

    protected $listeners = ['showCommitteeMemberships' => 'show'];

    public function mount()
    {
        $this->fields = [
            ['key' => 'committee_id', 'label' => 'Committee', 'type' => 'select'],
            ['key' => 'committee_position_id', 'label' => 'Position', 'type' => 'select'],
            ['key' => 'note', 'label' => 'Note', 'type' => 'textarea'],
        ];
    }

    public function show($id): void
    {
        $model = CommitteeMembership::with(['createdBy', 'updatedBy', 'committee', 'committeePosition'])->findOrFail($id);

        $this->details = app(\App\Services\ReferenceDetailsBuilder::class)->build($model, $this->fields);

        // Override IDs with relation names
        $this->details['committee_id'] = optional($model->committee)->name ?? $model->committee_id;
        $this->details['committee_position_id'] = optional($model->committeePosition)->name ?? $model->committee_position_id;

        $activityModel = config('activitylog.activity_model', \Spatie\Activitylog\Models\Activity::class);

        $activity = $activityModel::with('causer')
            ->where('subject_type', get_class($model))
            ->where('subject_id', $model->getKey())
            ->latest()
            ->limit(20)
            ->get();

        $this->details['_meta']['activity'] = app(\App\Services\ActivityHistoryNormalizer::class)->normalize($activity, $this->fields);

        $this->open = true;
    }

    public function render()
    {
        return view('livewire.profile.fceer.subsections.committee_memberships.details-modal');
    }
}
```

**Key Points:**
- **ReferenceDetailsBuilder**: Service to format field values
- **Activity history**: Last 20 activity logs normalized
- **Relation names**: Override IDs with actual names for display
- **Scoped listener**: `showCommitteeMemberships` (unique per subsection)

---

### Component 5: Archive Modal

**File**: `app/Http/Livewire/Profile/Fceer/Subsections/CommitteeMemberships/CommitteeMembershipsArchive.php`

```php
<?php

namespace App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CommitteeMembership;
use Illuminate\Support\Facades\Gate;
use Masmerise\Toaster\Toastable;
use App\Http\Livewire\Traits\SelectRows;

class CommitteeMembershipsArchive extends Component
{
    use WithPagination;
    use SelectRows;
    use Toastable;

    public bool $open = false;
    public array $selected = [];
    public bool $selectAll = false;
    public string $modelClass = CommitteeMembership::class;
    public int $perPage = 15;

    protected $listeners = [
        'openCommitteeMembershipsArchive' => 'open',
        'refreshCommitteeMembershipsArchive' => 'handleRefresh',
    ];

    public function open()
    {
        $this->open = true;
        $this->clearSelection();
        $this->dispatch('savedCredential');
        $this->resetPage();
    }

    public function close()
    {
        $this->open = false;
    }

    public function restore($id)
    {
        $this->emit('confirmCommitteeMembershipsRestore', [
            'ids' => [$id],
            'modelClass' => $this->modelClass,
        ]);

        $this->open = false;
    }

    public function forceDelete($id)
    {
        $this->emit('confirmCommitteeMembershipsForceDelete', [
            'ids' => [$id],
            'modelClass' => $this->modelClass,
        ]);

        $this->open = false;
    }

    public function prepareBulkAction(string $action)
    {
        if ($action === 'restoreSelected') {
            $this->emit('confirmCommitteeMembershipsRestore', [
                'ids' => $this->selected,
                'modelClass' => $this->modelClass,
            ]);
        } elseif ($action === 'forceDeleteSelected') {
            $this->emit('confirmCommitteeMembershipsForceDelete', [
                'ids' => $this->selected,
                'modelClass' => $this->modelClass,
            ]);
        }

        $this->open = false;
    }

    public function render()
    {
        $items = ($this->modelClass)::onlyTrashed()
            ->with('deletedBy', 'committee', 'committeePosition')
            ->paginate($this->perPage);

        return view('livewire.profile.fceer.subsections.committee_memberships.archive-modal', compact('items'));
    }
}
```

**Key Points:**
- **onlyTrashed()**: Shows only soft-deleted records
- **SelectRows trait**: Handles checkbox selection logic
- **Bulk actions**: Restore or force-delete multiple items
- **Delegation**: Emits events to Restore/ForceDelete modals

---

### Components 6-8: Delete, Restore, Force-Delete Modals

These follow the same pattern. Here's the **Delete Modal** as an example:

**File**: `app/Http/Livewire/Profile/Fceer/Subsections/CommitteeMemberships/CommitteeMembershipsDeleteModal.php`

```php
<?php

namespace App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships;

use Livewire\Component;
use App\Models\CommitteeMembership;
use Illuminate\Support\Facades\Gate;
use Masmerise\Toaster\Toastable;

class CommitteeMembershipsDeleteModal extends Component
{
    use Toastable;

    public bool $open = false;
    public array $targetIds = [];
    public array $labels = [];

    protected $listeners = ['openCommitteeMembershipsDeleteModal' => 'open'];

    public function open($data)
    {
        if (is_array($data) && isset($data['ids'])) {
            $this->targetIds = $data['ids'];
        } elseif (is_numeric($data)) {
            $this->targetIds = [(int) $data];
        } else {
            $this->targetIds = [];
        }

        $this->resolveLabels();
        $this->open = true;
    }

    protected function resolveLabels(): void
    {
        $this->labels = [];
        try {
            $this->labels = CommitteeMembership::with(['committee', 'committeePosition'])
                ->whereIn('id', $this->targetIds)
                ->get()
                ->map(function ($m) {
                    $name = optional($m->committee)->name ?? (string) ($m->committee_id ?? '');
                    $pos = optional($m->committeePosition)->name ?? (string) ($m->committee_position_id ?? '');
                    return trim($name . ($pos !== '' ? ' — ' . $pos : ''));
                })->toArray();
        } catch (\Throwable $e) {
            $this->labels = [];
        }
    }

    public function confirm()
    {
        $items = CommitteeMembership::whereIn('id', $this->targetIds)->get();

        foreach ($items as $item) {
            Gate::authorize('manageCommitteeMemberships', $item->user);

            $item->deleted_by_id = auth()->id();
            $item->save();
            $item->delete();

            if (function_exists('activity')) {
                activity()->performedOn($item)->causedBy(auth()->user())->log('deleted');
            }
        }

        $count = count($this->labels);
        if ($count === 1) {
            $this->success('Deleted: ' . $this->labels[0]);
        } else {
            $preview = implode(', ', array_slice($this->labels, 0, 3));
            $more = $count > 3 ? ' and ' . ($count - 3) . ' more' : '';
            $this->success('Deleted ' . $count . ' items: ' . $preview . $more);
        }

        $this->open = false;
        $this->dispatch('savedCredential');
        $this->emit('refreshList');
    }

    public function render()
    {
        return view('livewire.profile.fceer.subsections.committee_memberships.delete-modal');
    }
}
```

**Key Points:**
- **Labels array**: Pre-computed display strings (not full models)
- **Authorization**: Checks policy before deletion
- **Soft delete**: Sets deleted_by_id then calls delete()
- **Toast notifications**: Shows success with item preview

**Restore and ForceDelete modals** follow the same pattern but:
- **Restore**: Uses `onlyTrashed()` and calls `restore()`
- **ForceDelete**: Uses `onlyTrashed()` and calls `forceDelete()` (permanent)

---

## Summary of Part 2

At this stage, you have implemented:

✅ **Main List Component** - Displays records with table/card view
✅ **Form Modal** - Create/edit with duplicate detection
✅ **Confirm Modal** - Scoped save handler with activity logging
✅ **Details Modal** - View record details with activity history
✅ **Archive Modal** - View soft-deleted records
✅ **Delete/Restore/ForceDelete Modals** - Lifecycle management

**Next**: Part 3 will cover Blade views, styling, and UI patterns.
