# Profile Subsection Implementation Guide - Part 1: Overview & Foundation

This guide documents the complete pattern for implementing a new profile subsection in the FCEER Records system, based on the SubjectTeachers and CommitteeMemberships implementations.

---

## Section 1: Overview of the Pattern

### What is a Profile Subsection?

A profile subsection is a self-contained module that manages a specific type of user data within a profile context. Each subsection follows a consistent CRUD (Create, Read, Update, Delete) pattern with:

- **List view** with table and card layouts
- **Form modal** for create/edit
- **Scoped confirm modal** for validation before save
- **Details modal** with field display and activity history
- **Archive modal** for viewing soft-deleted records
- **Delete/Restore/Force-delete modals** for lifecycle management

### Architecture Principles

1. **Config-Driven**: Subsections are registered in `config/profile/fceer.php`
2. **Self-Contained**: Each subsection lives in its own namespace/folder
3. **Livewire-Based**: Uses Livewire for reactive components
4. **Policy-Protected**: Authorization via ProfilePolicy methods
5. **Activity Logged**: Spatie ActivityLog tracks all changes
6. **Soft Deletes**: Records are archived before permanent deletion

### File Structure

For a subsection named `CommitteeMemberships`:

```
app/
  Http/
    Livewire/
      Profile/
        Fceer/
          Subsections/
            CommitteeMemberships/
              CommitteeMemberships.php              # Main list component
              CommitteeMembershipsFormModal.php      # Create/edit form
              CommitteeMembershipsConfirmModal.php   # Scoped confirm handler
              CommitteeMembershipsDetailsModal.php   # View details
              CommitteeMembershipsArchive.php        # Archive view
              CommitteeMembershipsDeleteModal.php    # Delete confirmation
              CommitteeMembershipsRestoreModal.php   # Restore confirmation
              CommitteeMembershipsForceDeleteModal.php # Permanent delete

  Models/
    CommitteeMembership.php                          # Eloquent model

  Policies/
    ProfilePolicy.php                                # Authorization logic

resources/
  views/
    livewire/
      profile/
        fceer/
          subsections/
            committee_memberships/
              index.blade.php                        # Main list view
              form-modal.blade.php                   # Form UI
              confirm-changes-modal.blade.php        # Confirm UI
              details-modal.blade.php                # Details UI
              archive-modal.blade.php                # Archive table
              delete-modal.blade.php                 # Delete confirm
              restore-modal.blade.php                # Restore confirm
              force-delete-modal.blade.php           # Force delete confirm

config/
  profile/
    fceer.php                                        # Subsection registration

database/
  migrations/
    YYYY_MM_DD_HHMMSS_create_committee_memberships_table.php
```

### Key Concepts

#### 1. **Event Flow Pattern**

```
User clicks "Add" 
  → Main component emits 'requestOpenProfileModal'
  → FormModal opens with blank form
  → User fills form
  → User clicks "Save"
  → FormModal dispatches scoped event: 'confirmCommitteeMembershipSave'
  → ConfirmModal listens for scoped event
  → ConfirmModal performs validation & save
  → ConfirmModal emits 'savedCredential'
  → Main component refreshes list
  → Toast notification shown
```

#### 2. **Scoped Events**

To avoid event name collisions, each subsection uses **scoped event names**:

```php
// SubjectTeachers uses:
$this->dispatch('confirmSubjectTeacherSave', ...);

// CommitteeMemberships uses:
$this->dispatch('confirmCommitteeMembershipSave', ...);
```

#### 3. **Authorization Layers**

- **View Profile**: Any authenticated user with `view` policy
- **Manage Subsection**: Specific policy methods per subsection:
  - `manage()` - General credentials (used by SubjectTeachers)
  - `manageCommitteeMemberships()` - Restricted to System Manager + Executive only

#### 4. **Activity Logging**

All CRUD operations are logged using Spatie ActivityLog:

- **Create**: `activity()->performedOn($model)->causedBy($user)->log('created')`
- **Update**: `activity()->performedOn($model)->causedBy($user)->log('updated')`
- **Delete**: `activity()->performedOn($model)->causedBy($user)->log('deleted')`
- **Restore**: `activity()->performedOn($model)->causedBy($user)->log('restored')`
- **Force Delete**: `activity()->performedOn($model)->causedBy($user)->log('force_deleted')`

#### 5. **Duplicate Detection**

Form modals check for duplicates using `withTrashed()` because:
- Database unique constraints include soft-deleted rows
- Prevents user from recreating a recently deleted record
- Shows yellow alert banner when duplicate detected

---

## Section 2: Database & Configuration Setup

### Step 1: Create Migration

**File**: `database/migrations/YYYY_MM_DD_HHMMSS_create_committee_memberships_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('committee_memberships', function (Blueprint $table) {
            $table->id();
            
            // Foreign keys
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('committee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('committee_position_id')->constrained()->cascadeOnDelete();
            
            // Optional fields
            $table->text('note')->nullable();
            
            // Audit fields
            $table->foreignId('created_by_id')->nullable()->constrained('users');
            $table->foreignId('updated_by_id')->nullable()->constrained('users');
            $table->foreignId('deleted_by_id')->nullable()->constrained('users');
            
            // Soft deletes
            $table->softDeletes();
            $table->timestamps();
            
            // Unique constraint (includes soft-deleted)
            $table->unique(['user_id', 'committee_id', 'committee_position_id', 'deleted_at'], 'unique_committee_membership');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('committee_memberships');
    }
};
```

**Key Points:**
- **user_id**: Links to the profile owner
- **Audit fields**: Track who created/updated/deleted
- **softDeletes()**: Enables archive functionality
- **Unique constraint**: Prevents duplicates (includes deleted_at for soft-delete awareness)

### Step 2: Create Eloquent Model

**File**: `app/Models/CommitteeMembership.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommitteeMembership extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'committee_memberships';

    protected $fillable = [
        'user_id',
        'committee_id',
        'committee_position_id',
        'note',
        'created_by_id',
        'updated_by_id',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function committee(): BelongsTo
    {
        return $this->belongsTo(Committee::class);
    }

    public function committeePosition(): BelongsTo
    {
        return $this->belongsTo(CommitteePosition::class, 'committee_position_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by_id');
    }
}
```

**Key Points:**
- **SoftDeletes trait**: Required for archive functionality
- **Audit relationships**: createdBy, updatedBy, deletedBy for tracking
- **Related models**: Define all BelongsTo relationships for eager loading

### Step 3: Register in Profile Config

**File**: `config/profile/fceer.php`

```php
<?php

return [
    'subsections' => [
        'subject_teachers' => [
            'label' => 'Subject Assignments',
            'icon' => 'academic-cap',
            'model' => \App\Models\SubjectTeacher::class,
            'fields' => [
                [
                    'key' => 'volunteer_subject_id',
                    'label' => 'Volunteer Subject',
                    'type' => 'select',
                    'required' => true,
                    'options_source' => \App\Models\VolunteerSubject::class,
                ],
                [
                    'key' => 'subject_proficiency',
                    'label' => 'Proficiency Level',
                    'type' => 'text',
                    'required' => false,
                ],
            ],
        ],

        'committee_memberships' => [
            'label' => 'Committee Memberships',
            'icon' => 'users',
            'model' => \App\Models\CommitteeMembership::class,
            'fields' => [
                [
                    'key' => 'committee_id',
                    'label' => 'Committee',
                    'type' => 'select',
                    'required' => true,
                    'options_source' => \App\Models\Committee::class,
                ],
                [
                    'key' => 'committee_position_id',
                    'label' => 'Position',
                    'type' => 'select',
                    'required' => true,
                    'options_source' => \App\Models\CommitteePosition::class,
                ],
                [
                    'key' => 'note',
                    'label' => 'Note',
                    'type' => 'textarea',
                    'required' => false,
                ],
            ],
        ],

        // Add more subsections here...
    ],
];
```

**Config Structure:**
- **subsections**: Array of subsection definitions
- **Key**: Snake_case name (used for folder/component naming)
- **label**: Display name in UI
- **icon**: Flux icon name
- **model**: Eloquent model class
- **fields**: Array of field definitions for forms

**Field Definition:**
- **key**: Database column name
- **label**: Display label
- **type**: Input type (text, select, textarea, date, number, etc.)
- **required**: Boolean
- **options_source**: Model class for select dropdowns (optional)

### Step 4: Load Config in AppServiceProvider

**File**: `app/Providers/AppServiceProvider.php`

```php
public function boot(): void
{
    // Load profile configs from subfolder
    config(['profile.personal' => require config_path('profile/personal.php')]);
    config(['profile.account' => require config_path('profile/account.php')]);
    config(['profile.credentials' => require config_path('profile/credentials.php')]);
    config(['profile.fceer' => require config_path('profile/fceer.php')]);
    
    // ... rest of boot method
}
```

### Step 5: Run Migration

```bash
php artisan migrate
```

---

## Summary of Part 1

At this stage, you have:

✅ **Understood the architecture** - Event flow, scoped events, authorization layers
✅ **Created the database table** - With audit fields, soft deletes, and unique constraints
✅ **Created the Eloquent model** - With relationships and SoftDeletes trait
✅ **Registered in config** - Defined fields and subsection metadata
✅ **Loaded config** - Made available to the application

**Next**: Part 2 will cover implementing the Livewire components (main list, modals, etc.)
