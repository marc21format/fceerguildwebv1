# Profile Subsection Implementation Guide - Part 4: Registration, Policies & Complete Workflow

This guide completes the implementation series with service provider registration, authorization policies, and a complete workflow walkthrough.

---

## Section 5: Service Provider Registration & Policies

### Step 1: Register Livewire Components

**File**: `app/Providers/AppServiceProvider.php`

Add all component registrations in the `boot()` method:

```php
public function boot(): void
{
    // ... existing config loading ...

    if (class_exists(Livewire::class)) {
        // ... existing components ...

        // Committee Memberships Subsection - Hyphenated Aliases
        Livewire::component('profile.fceer.subsections.committee-memberships.committee-memberships', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMemberships::class);
        Livewire::component('profile.fceer.subsections.committee-memberships.committee-memberships-form-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsFormModal::class);
        Livewire::component('profile.fceer.subsections.committee-memberships.committee-memberships-confirm-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsConfirmModal::class);
        Livewire::component('profile.fceer.subsections.committee-memberships.committee-memberships-details-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsDetailsModal::class);
        Livewire::component('profile.fceer.subsections.committee-memberships.committee-memberships-archive', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsArchive::class);
        Livewire::component('profile.fceer.subsections.committee-memberships.committee-memberships-delete-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsDeleteModal::class);
        Livewire::component('profile.fceer.subsections.committee-memberships.committee-memberships-restore-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsRestoreModal::class);
        Livewire::component('profile.fceer.subsections.committee-memberships.committee-memberships-force-delete-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsForceDeleteModal::class);

        // Backwards-compatible underscore aliases (for layout auto-detection)
        Livewire::component('profile.fceer.subsections.committee_memberships.committee_memberships', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMemberships::class);
        Livewire::component('profile.fceer.subsections.committee_memberships.committee_memberships-form-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsFormModal::class);
        Livewire::component('profile.fceer.subsections.committee_memberships.committee_memberships-details-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsDetailsModal::class);
        Livewire::component('profile.fceer.subsections.committee_memberships.committee_memberships-archive', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsArchive::class);
        Livewire::component('profile.fceer.subsections.committee_memberships.committee_memberships-delete-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsDeleteModal::class);
        Livewire::component('profile.fceer.subsections.committee_memberships.committee_memberships-restore-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsRestoreModal::class);
        Livewire::component('profile.fceer.subsections.committee_memberships.committee_memberships-force-delete-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsForceDeleteModal::class);
        Livewire::component('profile.fceer.subsections.committee_memberships.committee_memberships-confirm-modal', 
            \App\Http\Livewire\Profile\Fceer\Subsections\CommitteeMemberships\CommitteeMembershipsConfirmModal::class);
    }
}
```

**Why Both Naming Conventions?**
- **Hyphenated** (`committee-memberships`): Used in Blade `@livewire()` directives
- **Underscore** (`committee_memberships`): Used by layout auto-discovery (matches config key)

---

### Step 2: Authorization Policy

**File**: `app/Policies/ProfilePolicy.php`

Add authorization methods for your subsection:

```php
<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * General profile view permission
     */
    public function view(User $currentUser, User $profileUser): bool
    {
        // Users can view their own profile
        if ($currentUser->id === $profileUser->id) {
            return true;
        }

        // Admins, instructors, system managers can view any profile
        return in_array($currentUser->role, ['admin', 'instructor', 'system_manager', 'executive']);
    }

    /**
     * General credential management (used by SubjectTeachers)
     */
    public function manage(User $currentUser, User $profileUser): bool
    {
        // Users can manage their own credentials
        if ($currentUser->id === $profileUser->id) {
            return true;
        }

        // Admins, instructors, system managers can manage any profile
        return in_array($currentUser->role, ['admin', 'instructor', 'system_manager', 'executive']);
    }

    /**
     * Committee membership management (restricted to System Manager + Executive only)
     */
    public function manageCommitteeMemberships(User $currentUser, User $profileUser): bool
    {
        // Only System Manager and Executive can manage committee memberships
        return in_array($currentUser->role, ['system_manager', 'executive']);
    }

    // Add more subsection-specific methods as needed...
}
```

**Authorization Levels:**

1. **view()**: Basic profile viewing (most users)
2. **manage()**: General credentials (users + staff)
3. **manageCommitteeMemberships()**: Restricted subsection (managers only)

**Usage in Components:**

```php
// In CommitteeMemberships component
public function create()
{
    $this->authorize('manageCommitteeMemberships', $this->user);
    // ... rest of method
}

public function relayEdit($itemId)
{
    $this->authorize('manageCommitteeMemberships', $this->user);
    // ... rest of method
}
```

---

### Step 3: Register Policy

**File**: `app/Providers/AuthServiceProvider.php`

```php
<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Policies\ProfilePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => ProfilePolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
```

---

## Section 6: Complete Event Flow & Testing Guide

### Event Flow Diagram

```
┌─────────────────────────────────────────────────────────────────────────┐
│                         CREATE/EDIT WORKFLOW                             │
└─────────────────────────────────────────────────────────────────────────┘

1. USER CLICKS "ADD" BUTTON
   └─> CommitteeMemberships::create()
       └─> authorize('manageCommitteeMemberships', $user)
       └─> emit('requestOpenProfileModal', [instanceKey, userId])

2. FORM MODAL OPENS
   └─> CommitteeMembershipsFormModal::open($params)
       └─> Extract userId from params
       └─> If editing: Load existing record
       └─> Set $open = true

3. USER FILLS FORM & CHANGES FIELD
   └─> wire:model.live triggers updatedStateCommitteeId()
       └─> checkDuplicate()
           └─> Query withTrashed() for existing record
           └─> Show yellow alert if duplicate found

4. USER CLICKS "SAVE"
   └─> CommitteeMembershipsFormModal::save()
       └─> Validate input
       └─> dispatch('confirmCommitteeMembershipSave', [itemId, state, userId])
       └─> Close form modal

5. CONFIRM MODAL RECEIVES EVENT
   └─> CommitteeMembershipsConfirmModal::handleSave($payload)
       └─> Check for soft-deleted duplicate
           ├─> If exists: restore() + update()
           ├─> If editing: update existing
           └─> If new: create new record
       └─> Set created_by_id, updated_by_id
       └─> Log activity (created/updated/restored)
       └─> dispatch('savedCredential')
       └─> emit('refreshList')

6. LIST REFRESHES
   └─> CommitteeMemberships::handleSavedCredential()
       └─> Clear selection
       └─> Refresh component ($refresh)
       └─> Toast notification shown

┌─────────────────────────────────────────────────────────────────────────┐
│                         DELETE WORKFLOW                                  │
└─────────────────────────────────────────────────────────────────────────┘

1. USER CLICKS "DELETE" IN CONTEXT MENU
   └─> CommitteeMemberships::relayDelete($itemId)
       └─> authorize('manageCommitteeMemberships', $user)
       └─> emit('openCommitteeMembershipsDeleteModal', $itemId)

2. DELETE MODAL OPENS
   └─> CommitteeMembershipsDeleteModal::open($data)
       └─> Extract IDs (single or bulk)
       └─> resolveLabels() - Load names for display
       └─> Set $open = true

3. USER CONFIRMS DELETE
   └─> CommitteeMembershipsDeleteModal::confirm()
       └─> Load records
       └─> For each: authorize(), set deleted_by_id, delete()
       └─> Log activity ('deleted')
       └─> Toast notification
       └─> dispatch('savedCredential')

4. LIST REFRESHES
   └─> Record no longer visible in main list
   └─> Now available in Archive

┌─────────────────────────────────────────────────────────────────────────┐
│                    ARCHIVE/RESTORE WORKFLOW                              │
└─────────────────────────────────────────────────────────────────────────┘

1. USER CLICKS "ARCHIVE" BUTTON
   └─> CommitteeMemberships::openArchive()
       └─> emit('openCommitteeMembershipsArchive')

2. ARCHIVE MODAL OPENS
   └─> CommitteeMembershipsArchive::open()
       └─> Query onlyTrashed()
       └─> Display soft-deleted records

3. USER CLICKS "RESTORE" ON A ROW
   └─> CommitteeMembershipsArchive::restore($id)
       └─> emit('confirmCommitteeMembershipsRestore', [ids])
       └─> Close archive modal

4. RESTORE MODAL OPENS
   └─> CommitteeMembershipsRestoreModal::open($data)
       └─> Load soft-deleted records
       └─> resolveLabels()

5. USER CONFIRMS RESTORE
   └─> CommitteeMembershipsRestoreModal::confirm()
       └─> For each: authorize(), restore()
       └─> Log activity ('restored')
       └─> dispatch('savedCredential')
       └─> emit('refreshCommitteeMembershipsArchive')

6. RECORD RESTORED
   └─> Back in main list
   └─> No longer in archive
```

---

### Testing Checklist

#### Functional Tests

- [ ] **Create**
  - [ ] Can create new record with all required fields
  - [ ] Validation errors show for missing required fields
  - [ ] Toast notification shows success message
  - [ ] Record appears in list immediately

- [ ] **Duplicate Detection**
  - [ ] Yellow alert shows when duplicate exists
  - [ ] Can still save (restores soft-deleted record)
  - [ ] Alert includes committee and position names
  - [ ] Alert disappears when field changed

- [ ] **Edit**
  - [ ] Can open edit modal from context menu
  - [ ] Form pre-fills with existing values
  - [ ] Changes save correctly
  - [ ] updated_by_id and updated_at update

- [ ] **Details View**
  - [ ] Modal opens with all fields displayed
  - [ ] Committee and position show names (not IDs)
  - [ ] Created/Updated metadata shows correctly
  - [ ] Activity history displays last 20 changes
  - [ ] Text hierarchy is correct (heading > subheading > body)

- [ ] **Delete**
  - [ ] Delete modal shows correct item(s)
  - [ ] Soft delete sets deleted_by_id
  - [ ] Record removed from main list
  - [ ] Record appears in archive
  - [ ] Activity logged

- [ ] **Archive**
  - [ ] Archive button opens modal
  - [ ] Shows only soft-deleted records
  - [ ] Displays deleted_by and deleted_at
  - [ ] Pagination works

- [ ] **Restore**
  - [ ] Can restore from archive
  - [ ] Record returns to main list
  - [ ] Record removed from archive
  - [ ] Activity logged

- [ ] **Force Delete**
  - [ ] Shows permanent delete warning
  - [ ] Permanently removes from database
  - [ ] No longer appears in archive
  - [ ] Cannot be restored

#### Authorization Tests

- [ ] **System Manager**
  - [ ] Can view all profiles
  - [ ] Can create/edit/delete committee memberships
  - [ ] Can access archive
  - [ ] Can restore/force-delete

- [ ] **Executive**
  - [ ] Same permissions as System Manager

- [ ] **Admin/Instructor**
  - [ ] Can view profiles
  - [ ] **Cannot** manage committee memberships
  - [ ] Gets 403 error when attempting

- [ ] **Student/Guest**
  - [ ] Can view own profile only
  - [ ] **Cannot** manage committee memberships
  - [ ] Gets 403 error when attempting

#### UI/UX Tests

- [ ] **Table View**
  - [ ] Row numbers show/hide correctly
  - [ ] Checkboxes work for selection
  - [ ] Header checkbox has indeterminate state
  - [ ] Context menu opens on button click
  - [ ] Bulk delete works with multiple selections

- [ ] **Card View**
  - [ ] Cards display correctly
  - [ ] Responsive on mobile
  - [ ] View toggle works

- [ ] **Dark Mode**
  - [ ] All text is readable
  - [ ] Backgrounds and borders appropriate
  - [ ] No white/black color flashes

- [ ] **Accessibility**
  - [ ] Can tab through all interactive elements
  - [ ] Screen reader announces labels
  - [ ] Keyboard shortcuts work (Escape closes modals)

---

### Common Issues & Solutions

#### Issue 1: "Component not found"

**Problem**: `Livewire component [profile.fceer.subsections.committee-memberships.committee-memberships] not found.`

**Solution**: 
- Check component is registered in AppServiceProvider
- Verify namespace matches class location
- Clear Livewire cache: `php artisan livewire:clear-cache`

---

#### Issue 2: "User ID is missing"

**Problem**: Form saves but shows error "User ID is missing"

**Solution**:
- Ensure FormModal captures userId in open() method:
  ```php
  $this->userId = $params['userId'] ?? null;
  ```
- Ensure main component passes userId in emit:
  ```php
  $this->emit('requestOpenProfileModal', [
      'instanceKey' => CommitteeMembership::class,
      'userId' => $this->user->id,  // ← Must include this
  ]);
  ```

---

#### Issue 3: Duplicate detection not working

**Problem**: Duplicate alert never shows

**Solution**:
- Use `wire:model.live` (not just `wire:model`)
- Ensure updated hooks exist:
  ```php
  public function updatedStateCommitteeId() {
      $this->checkDuplicate();
  }
  ```
- Check withTrashed() is used in query

---

#### Issue 4: Events not firing

**Problem**: Clicking button does nothing

**Solution**:
- Check listener array matches event name exactly (case-sensitive)
- Verify scoped event names are unique per subsection
- Check browser console for JavaScript errors
- Use `$this->emit()` instead of `$this->dispatch()` for legacy support

---

#### Issue 5: Authorization 403 errors

**Problem**: All users get 403 when trying to manage

**Solution**:
- Check ProfilePolicy method name matches authorize() call
- Verify policy is registered in AuthServiceProvider
- Check user role in database matches expected roles
- Clear policy cache: `php artisan cache:clear`

---

## Quick Start Checklist

When creating a new subsection, follow these steps in order:

### Phase 1: Foundation (15 min)
- [ ] Create migration with audit fields and soft deletes
- [ ] Create Eloquent model with relationships
- [ ] Add subsection to `config/profile/fceer.php`
- [ ] Run migration

### Phase 2: Components (45 min)
- [ ] Create main list component (CommitteeMemberships.php)
- [ ] Create form modal component
- [ ] Create confirm modal component (scoped handler)
- [ ] Create details modal component
- [ ] Create archive component
- [ ] Create delete/restore/force-delete modals

### Phase 3: Views (30 min)
- [ ] Create index.blade.php (table/cards)
- [ ] Create form-modal.blade.php
- [ ] Create confirm-changes-modal.blade.php (can be empty)
- [ ] Create details-modal.blade.php
- [ ] Create archive-modal.blade.php
- [ ] Create delete/restore/force-delete blade views

### Phase 4: Registration (10 min)
- [ ] Register all components in AppServiceProvider (both naming conventions)
- [ ] Add policy method to ProfilePolicy
- [ ] Test authorization with different user roles

### Phase 5: Testing (30 min)
- [ ] Test create/edit/delete flows
- [ ] Test duplicate detection
- [ ] Test archive/restore/force-delete
- [ ] Test authorization for all roles
- [ ] Test UI in light/dark mode
- [ ] Test on mobile viewport

**Total estimated time**: 2 hours for a complete subsection

---

## Advanced Patterns

### Pattern 1: Conditional Field Visibility

Show/hide fields based on other field values:

```php
// In FormModal component
public function updatedStateCommitteeId()
{
    // Load positions for selected committee
    if ($this->state['committee_id']) {
        $this->availablePositions = CommitteePosition::where('committee_id', $this->state['committee_id'])->get();
    }
    
    $this->checkDuplicate();
}
```

```blade
{{-- In form-modal.blade.php --}}
@if($state['committee_id'])
    <flux:field>
        <flux:label>Position</flux:label>
        <flux:select wire:model.live="state.committee_position_id">
            @foreach($availablePositions as $position)
                <option value="{{ $position->id }}">{{ $position->name }}</option>
            @endforeach
        </flux:select>
    </flux:field>
@endif
```

---

### Pattern 2: Bulk Operations

Enable bulk delete, bulk restore, etc:

```php
// In main component
public function deleteSelected()
{
    $this->authorize('manageCommitteeMemberships', $this->user);
    
    $ids = array_values(array_map('strval', (array) $this->selected));
    $this->emit('openCommitteeMembershipsDeleteModal', ['ids' => $ids]);
}

// Delete modal handles array of IDs automatically
```

---

### Pattern 3: Custom Validation Rules

Add complex validation in ConfirmModal:

```php
public function handleSave(array $payload)
{
    // Custom validation
    $validator = \Validator::make($payload['state'], [
        'committee_id' => 'required|exists:committees,id',
        'committee_position_id' => [
            'required',
            'exists:committee_positions,id',
            function ($attribute, $value, $fail) use ($payload) {
                // Check if position belongs to selected committee
                $position = CommitteePosition::find($value);
                if ($position && $position->committee_id != $payload['state']['committee_id']) {
                    $fail('The selected position does not belong to the selected committee.');
                }
            },
        ],
    ]);

    if ($validator->fails()) {
        $this->error($validator->errors()->first());
        return;
    }

    // Continue with save...
}
```

---

## Summary of Part 4

You now have the complete implementation guide:

✅ **Service Provider Registration** - Both naming conventions
✅ **Authorization Policies** - Role-based access control
✅ **Complete Event Flow** - Visual diagrams of all workflows
✅ **Testing Checklist** - Comprehensive test scenarios
✅ **Troubleshooting Guide** - Common issues and solutions
✅ **Quick Start Checklist** - Step-by-step implementation guide
✅ **Advanced Patterns** - Conditional fields, bulk ops, custom validation

---

## Final Notes

**Congratulations!** You can now:

1. Create a new profile subsection from scratch in ~2 hours
2. Understand the complete event flow for CRUD operations
3. Implement authorization policies for role-based access
4. Test thoroughly with the provided checklist
5. Debug common issues quickly

**Best Practices Recap:**

- Always use scoped event names to avoid collisions
- Capture user_id early and carry through the workflow
- Use withTrashed() for duplicate detection
- Log all CRUD operations with Spatie ActivityLog
- Set audit fields (created_by_id, updated_by_id, deleted_by_id)
- Check authorization before sensitive operations
- Provide clear toast notifications for user feedback
- Support both table and card views for better UX
- Include proper dark mode styling
- Test with multiple user roles

**Resources:**

- Part 1: Overview & Database Setup
- Part 2: Livewire Components
- Part 3: Blade Views & UI
- Part 4: Registration & Complete Workflow (this document)

Happy coding! 🚀
