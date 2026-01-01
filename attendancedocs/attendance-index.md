# Attendance / Index — Admin Roster (Daily / Weekly / Monthly)

Purpose and views
- Primary admin roster view for managing attendance across volunteers and students.
- View modes: `daily` (per-date roster), `weekly` (week aggregates), `monthly` (summary + charts).

Filters and scope
- Filters: `committee`, `position`, `batch`, `search (name/id)`, `date`/`range`, `status`.
- For students show session filter (`AM`/`PM`/`FULL`); for volunteers hide session and use timestamps.

Permissions & visibility
- Full roster + exports: `database_manager`, `volunteer_executive`, `volunteer_administrator`.
- Instructor: read-only per-class view. Students see only own rows.
- Enforce via `Gate::authorize('view-roster')` and `AttendancePolicy::view()` in `mount()`.

UI behavior
- Calendar navigator (day/week/month) with `Prev/Next` and `Today` quick action.
- Bulk actions: `Mark all present`, `Export CSV`, `Bulk update status`, `Bulk add excuse`.
- Row actions: edit record, set time-out, view audit log, open excuse modal.
- Use `wire:loading` placeholders and optimistic UI for quick bulk responses.

Data flow & performance
- Preferred: read from `attendance_aggregates` for charts and month summaries.
- Daily roster reads `attendance_records` with eager-loaded `user.profile` and `status`.
- Indexes: `attendance_records(user_id,date)`, `attendance_records(date,session)`, `status_id`.

Livewire component structure
- `app/Livewire/Attendance/Index`
  - Props: `public string $date`, `public ?int $committee`, `public ?int $position`, `public string $viewMode = 'daily'`.
  - Query string: `['date','committee','position','viewMode']`.
  - Listeners: `dateSelected`, `monthChanged`, `filtersUpdated`.
  - Methods: `mount()`, `loadRoster()`, `applyFilters()`, `bulkMarkPresent()`, `exportCsv()`.
  - Authorization: `mount()` calls `Gate::authorize('view-roster')`.

Queries (examples)
- Daily roster (with filters):
  AttendanceRecord::with(['user.profile','status'])
    ->whereDate('date', $date)
    ->when($committee, fn($q)=> $q->whereHas('user', fn($q)=> $q->where('committee_id',$committee)))
    ->when($position, fn($q)=> $q->whereHas('user', fn($q)=> $q->where('position_id',$position)))
    ->orderBy('user_id')
    ->paginate(50);

Testing checklist
- Livewire tests for `Attendance/Index` with filters and bulk actions.
- Unit tests for filter scopes and export formatting.
- Feature tests for `AttendancePolicy` enforcement.

Implementation priorities
1. Build index component with calendar navigation and server-side pagination.
2. Add bulk actions and CSV export.
3. Hook charts to `attendance_aggregates` and ensure filter parity.
