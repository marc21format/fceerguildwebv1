# Volunteer Attendance — Detailed Design

Purpose and views
- The volunteer attendance UI supports three primary views: Daily (per-date roster), Weekly (week or week-pair aggregates), and Monthly (month summary + analytics). The calendar component is the main navigator for switching date/week/month.

- Filters and scope
- Filters: `committee`, `position`, `batch` (cohort), `full name, volunteer number`.
- Note: volunteers do not use `session` (AM/PM/FULL). Volunteer records only use `time_in` and `time_out` and compute `total_hours` from those timestamps.

Student scanning note
- Reminder: students scan twice per day — `AM` and `PM` sessions. The system expects two separate student attendance rows per date (one with `session = AM`, one with `session = PM`). Ensure FormRequests and validation enforce `session` for student records and the unique `(user_id,date,session)` constraint.
- Filters apply to both the roster rows and analytics charts — analytics must reflect active filters.
- For multi-committee users, show committee selector; for single-committee users hide it.

Permissions & visibility
- Full roster + analytics: roles `database_manager`, `executive`, `dministrator` only.
- Instructor: per-user view only (read-only); no bulk actions or exports.
- Student: own data only.
- Enforce via `view-roster` gate and `AttendancePolicy::view()`; always authorize on server-side in `mount()` and data-loading methods.

Calendar behavior
- Use a calendar widget for navigation. Actions:
  - Day click: load day roster.
  - Prev/Next month: update month view and reload monthly aggregates.
  - Month picker: switch to monthly summary mode.
- Implement Livewire listeners `dateSelected`, `monthChanged`, and bind `$date`/`$month` to query string to preserve state.

Data flow & performance
- Preferred: pre-aggregated `attendance_aggregates` table with optional dimension columns (`committee_id`, `position_id`) to support fast analytics queries filtered by dimensions.
- Fallback: on-the-fly aggregation using grouped SQL queries for small-to-medium datasets.
- Always eager-load relations: `attendance_records->user.profile`, `status` to avoid N+1.
- Add DB indexes: `(date)`, `(user_id,date)`, `(status_id)`, and indexes on dimension columns used for aggregates.

Livewire component structure
- `app/Livewire/Attendance/Index` (Admin roster)
  - Props: `public string $date`, `public ?int $committee`, `public ?int $position`, `public string $viewMode = 'daily'`.
  - Query string: `protected $queryString = ['date','committee','position','viewMode'];`
  - Listeners: `protected $listeners = ['dateSelected' => 'onDateSelected', 'monthChanged' => 'onMonthChanged'];`
  - Methods: `mount()`, `loadRoster()`, `loadAggregatesForRange()`, `prevMonth()`, `nextMonth()`, `applyFilters()`.
  - Authorization: `mount()` calls `Gate::authorize('view-roster')`.

- `app/Livewire/Attendance/Profile` (Per-user read-only)
  - Shows per-date rows for selected month, small summary cards (total hours, days attended), and per-user analytics (uses aggregates scoped to user).
  - No bulk actions; edit buttons hidden unless `@can('update', $record)`.

Queries (examples)
- Daily roster (with filters):
  AttendanceRecord::with(['user.profile','status'])
    ->whereDate('date', $date)
    ->when($committee, fn($q)=> $q->whereHas('user', fn($q)=> $q->where('committee_id',$committee)))
    ->when($position, fn($q)=> $q->whereHas('user', fn($q)=> $q->where('position_id',$position)))
    ->orderBy('user_id')
    ->get();

- Aggregates (on-the-fly example): group-by date -> counts per status and sum total_hours, applying same `when()` filters as above.

- Analytics responsiveness
- Charts: use Chart.js for rendering on the client. Ensure Livewire components or API endpoints return Chart.js-friendly payloads (labels and datasets).
- Time handling: use Carbon for parsing and computing times and durations in services and Livewire components; store canonical times in the DB and convert for display.
- Charts must use the same filter parameters as the roster. Implement a single source of truth: the Livewire component keeps current `$filters` state and both `loadRoster()` and `loadAggregates()` read from it.
- Cache aggregated query results per `(filters, range, viewMode)` for short TTL (1–5 minutes) or invalidate on write.

UX and interactions
- Default the view to today's date and user's primary committee (if any).
- Provide quick actions for admins: `Mark all present`, `Export CSV`, `Bulk update status`.
- Show contextual messages: "Date outside active ReviewSeason — edits disabled".
- Use `wire:loading` placeholders for charts & roster while data loads.

Edge cases & rules
- Enforce unique (`user_id`,`date`,`session`) at DB level and in service logic.
- Students: display `N/A` for total time and hide clock-out controls.
- Historic edits: when admin edits past data, enqueue `RecalculateAggregatesJob` for affected ranges.
- Timezones: store times in UTC, present in user locale; ensure calendar and date parsing are consistent.

Testing checklist
- Unit test `AttendanceService::recordAttendance` for students vs volunteers and for season enforcement.
- Livewire tests for `Attendance/Index` in admin mode (filters applied) and `Attendance/Profile` for instructor/student view-only.
- Feature tests for `AttendancePolicy` to ensure roster-only roles can view full data.

Implementation priorities (short)
1. Migrations + `UserAttendanceStatusesSeeder` + indexes.
2. `AttendanceService` + `StoreAttendanceRequest` + `AttendancePolicy`.
3. `AggregateAttendanceJob` and `attendance_aggregates` (if pre-aggregate chosen).
4. Livewire `Attendance/Index` (daily) with calendar navigation and filters.
5. Week/Month views and Chart.js integration reading aggregates.

---

Reference: this file captures the volunteer-specific UI and implementation details discussed in the project chat; keep it synced with `docs/attendance-module.md`.
