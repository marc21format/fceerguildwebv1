# Attendance Module — Design & Implementation Notes

This document consolidates the attendance module decisions, data model notes, business rules, services, validation, authorization, analytics, and RFID considerations discussed for the project.

## Purpose
- Track attendance for volunteers and students.
- Volunteers: time-in / time-out, total hours, present/absent/tardy/excused.
- Students: AM/PM sessions, only `time_in` (no time_out), statuses: OnTime / Tardy / Absent / Excused.
- Support student excuse letters linked to attendance rows.
- Restrict create/edit/delete actions to admin, executive, and database_manager roles.
- Analytics (Chart.js) for students and volunteers (daily/weekly/monthly/overall).
- Enforce writes only during active ReviewSeason ranges.

---

## Key Tables & Fields

- `attendance_records`
  - `id`, `user_id`, `date` (date), `time_in` (time, nullable), `time_out` (time, nullable),
    `session` (enum: `AM`,`PM`,`FULL`), `status_id` (FK -> `user_attendance_statuses`),
    `total_hours` (decimal, nullable), `student_excuse_letter_id` (nullable),
    `recorded_by_id`, `updated_by_id`, timestamps, `deleted_at`.
  - Notes: For students `time_out` and `total_hours` are unused by design.

  - Clarification: `session` (AM/PM/FULL) is primarily used for student attendance (AM/PM sessions). Volunteers do not use `session` — volunteers record `time_in` and `time_out` only and `total_hours` is computed from those times.

- `user_attendance_statuses`
  - canonical rows: `N/A`, `OnTime`, `Tardy`, `Absent`, `Excused`.
  - `N/A` used as default outside active review season.

- `student_excuse_letters`
  - `id`, `user_id`, `am_attendance_id`, `pm_attendance_id`, `reason`, `date_attendance`,
    `status`, `letter_link`, timestamps, `deleted_at`.

- `review_seasons`
  - `start_month`, `start_year`, `end_month`, `end_year`, `is_active`, `set_by_user_id`.

- `attendance_aggregates` (recommended for analytics)
  - `id`, `date`, `scope_type` (`user|batch|overall|volunteer`), `scope_id` (nullable),
    `count_on_time`, `count_tardy`, `count_excused`, `count_absent`, `total_hours` (decimal),
    `total_students_or_volunteers`, `computed_at`.

Indexes:
- `attendance_records(user_id, date)`
- `attendance_records(date, session)`
- `attendance_records(status_id)`
- unique constraint: (`user_id`,`date`,`session`) to prevent duplicate session rows.

---

## Roles & Authorization (attendance-specific)

- Roles allowed to create/edit/delete attendance: `database_manager`, `volunteer_executive`, `volunteer_administrator`.
- Students & volunteer_instructor: view only their own attendance and profile.
- Guest: no attendance access.
- Implement via Policies/Gates; example gate `view-roster` or `manage-attendance`.
- Livewire components and controllers must call `Gate::authorize()` server-side; do not rely on UI-only checks.

---

## Business Rules

- Students: only `OnTime`, `Tardy`, `Absent`, `Excused`. No `time_out` concept.
- Volunteers: support `time_in` and `time_out`; compute `total_hours` when both present.
- Default status outside active review season: `N/A`.
- Writes (create/edit/delete) allowed only when the attendance `date` falls within an active ReviewSeason. Enforcement in both FormRequest `authorize()` and the Service layer for defense-in-depth.
- Unique per session: only one attendance record per `(user_id, date, session)`.
- StudentExcuseLetter creation must validate ownership of linked attendance rows and update attendance rows in a DB transaction.

Student scanning workflow (clarification)
- Students are expected to scan twice per review day: once for the AM session and once for the PM session (lunch/afternoon). Therefore student attendance uses `session` values `AM` and `PM` only.
- Enforce at the application and DB level: unique constraint on `(user_id, date, session)` prevents duplicate AM/PM rows; `session` should be required/validated for student records.

Volunteer workflow (clarification)
- Volunteers do not scan per-session. They record `time_in` and `time_out` only (no `session` required). `total_hours` is computed from those timestamps.


---

## Service Layer Responsibilities

Implement `app/Services/AttendanceService.php` with methods such as:
- `recordAttendance(array $data, User $actor)` — create or update record, compute `total_hours`, set `recorded_by_id`, enforce season.
- `clockOut(int $attendanceId, string $timeOut, User $actor)` — set time_out, compute hours.
- `linkExcuseLetter(int $letterId, array $attendanceIds, User $actor)` — link letter and update rows inside transaction.
- `deleteAttendance(int $id, User $actor)` — authorize + delete (soft) and recalc aggregates if needed.

Service rules:
- Wrap multi-model operations with `DB::transaction()`.
- Throw domain-specific exceptions for business-rule violations.
- Dispatch events after commit (or use `DB::afterCommit()` boilerplate).

Livewire and controllers call services; they do not contain domain logic beyond UI state, authorize, and validation.

Notes on time handling: Use Carbon (`CarbonImmutable` / `Carbon`) throughout services and Livewire components for parsing, comparison, timezone-aware calculations, and computing `total_hours`. Keep all storage normalized (dates/times in DB) and convert/display using user locale/timezone when rendering.

---

## Validation & FormRequests

- Use `FormRequest` classes for create/update (example `StoreAttendanceRequest`):
  - Basic rules: `user_id exists`, `date date`, `time_in`/`time_out` formats, `time_out after:time_in`, `session in:AM,PM,FULL`, `status_id exists`.
  - `authorize()` should ensure the caller has the right role and that the `date` is within active ReviewSeason.

- Reuse Request rules inside Livewire: instantiate the request and call `$this->validate($request->rules(), $request->messages())`.

---

## ReviewSeason Enforcement

- Helper functions: `ReviewSeason::active()`, `ReviewSeason::containsDate($date)`.
- Validation: FormRequest `authorize()` denies writes outside season.
- Defensive: Services verify season before persisting.
- UI: Livewire components hide/disable create/edit controls when no active season.

---

## Analytics (Chart.js) Design

Two-tier approach recommended:

1) Pre-aggregated (recommended for performance)
  - Daily `AggregateAttendanceJob` computes and writes to `attendance_aggregates`.
  - Chart endpoints (API or Livewire props) read aggregates and return JSON for Chart.js.
  - Aggregates include counts of OnTime/Tardy/Excused/Absent and `total_hours` for volunteers.

2) Real-time queries (acceptable for small datasets)
  - Group-by queries on `attendance_records` for the requested date range.

Student analytics:
- Student-level: counts of OnTime, Tardy, Excused, Absent over range (daily/weekly/monthly/overall).
- Class/overall: percentages and counts across all students.

Volunteer analytics:
- Per-volunteer: total man-hours (sum `total_hours`), counts present/absent.
- Overall: total man-hours and attendance counts aggregated over date ranges.

Personal analytics:
- Each user can view their own totals computed from aggregates or `attendance_records`.

Chart.js integration:
- Return JSON arrays for labels and datasets (daily/weekly/monthly). Use pre-aggregated data for speed.

Client charts: prefer Chart.js for chart rendering (or Chart.js wrappers). Livewire components or API endpoints should return Chart.js-friendly datasets (labels + datasets arrays).

---

## Jobs & Scheduling

- `AggregateAttendanceJob` (scheduled nightly): compute daily aggregates for students and volunteers and store in `attendance_aggregates`.
- `RecalculateAggregatesJob` for backfills when admins edit old records.
- `ArchiveUsersByAbsenceJob` (queued nightly) may set `users.is_active=false` when absence thresholds met.

---

## RFID / Scan Flow (future)

Design notes:
- Add `rfid_tag` column to `user_profiles` (or `fceer_profiles`).
- Create `scan_logs` table: `id, tag, user_id (nullable), device_id, scanned_at, processed_at, raw_payload`.
- Lightweight API endpoint `/api/rfid/scan` protected by API key; reader posts tag + timestamp.
- Processor matches tag -> user, enqueues AttendanceService calls (respecting season/session rules).
- Support offline readers by a local sync agent that POSTs batches when network available.
- Security: authenticate readers, log impersonation, and audit all scan events.

---

## Permissions Summary (attendance)

- Allowed to create/edit/delete attendance: `database_manager`, `volunteer_executive`, `volunteer_administrator` only.
- Allowed to view rosters/analytics: `database_manager`, `volunteer_executive`, `volunteer_administrator` (others see own data only).
- Student and instructor: view own attendance/profile only.

Implement via Policies and Gates; enforce server-side in controllers and Livewire `mount()`/actions.

---

## Implementation Checklist

- [ ] Migrations: `attendance_records`, `user_attendance_statuses`, `attendance_aggregates`, unique constraint on `(user_id,date,session)`.
- [ ] Seed `user_attendance_statuses` with canonical rows (N/A, OnTime, Tardy, Absent, Excused).
- [ ] Implement `StoreAttendanceRequest` and move validation out of Livewire.
- [ ] Create `AttendanceService` with transactional methods and season checks.
- [ ] Build Livewire components: `Attendance/Create`, `Attendance/Index`, `Attendance/Students`, `Attendance/Volunteers`.
- [ ] Implement aggregation jobs and Chart.js API endpoints.
- [ ] Add unit tests for services, Livewire tests for components, feature tests for policies.

---

## Complete Artifact Inventory

This section lists all concrete files, classes, migrations, jobs, requests, policies, controllers, Livewire components, seeds, and tests you should create for the attendance module. Use these as a checklist when scaffolding the feature.

- Migrations & Seeders
  - Migration: `create_user_attendance_statuses_table` — fields: `id`, `name`, `slug`, `description`, timestamps.
  - Migration: `create_attendance_records_table` — fields: `id`, `user_id`, `date`, `session`, `time_in`, `time_out`, `status_id`, `total_hours`, `student_excuse_letter_id`, `recorded_by_id`, `updated_by_id`, `deleted_at`, timestamps; add FKs and indexes plus unique (`user_id`,`date`,`session`).
  - Migration: `create_student_excuse_letters_table` — `id`, `user_id`, `am_attendance_id`, `pm_attendance_id`, `reason`, `date_attendance`, `status`, `letter_link`, `deleted_at`, timestamps.
  - Migration: `create_review_seasons_table` — `id`, `start_date`/`end_date` or `start_month/start_year`, `end_month/end_year`, `is_active`, `set_by_user_id`.
  - Migration: `create_attendance_aggregates_table` — `id`, `date`, `scope_type`, `scope_id`, `count_on_time`, `count_tardy`, `count_excused`, `count_absent`, `total_hours`, `total_students_or_volunteers`, `computed_at`.
  - Migration: `create_scan_logs_table` (RFID) — `id`, `tag`, `user_id`, `device_id`, `scanned_at`, `processed_at`, `raw_payload`, timestamps.
  - Seeder: `UserAttendanceStatusesSeeder` — insert canonical rows (`N/A`, `OnTime`, `Tardy`, `Absent`, `Excused`).

- Eloquent Models (if not present)
  - `AttendanceRecord` (`app/Models/AttendanceRecord.php`) — relationships: `user()`, `status()`, `excuseLetter()`, `recordedBy()`; casts for `date` and times.
  - `UserAttendanceStatus` — simple lookup.
  - `StudentExcuseLetter` — relationships: `user()`, `amAttendance()`, `pmAttendance()`.
  - `ReviewSeason` — helper methods `active()`, `containsDate()`.
  - `ScanLog` for RFID.

- Services (`app/Services`)
  - `AttendanceService.php` — methods: `recordAttendance(array $data, User $actor)`, `clockOut(int $id, Carbon $time, User $actor)`, `linkExcuseLetter(int $letterId, array $attendanceIds, User $actor)`, `deleteAttendance(int $id, User $actor)`, `recalculateTotalHours(AttendanceRecord $record)`; throw domain exceptions and use `DB::transaction()`.
  - `StudentExcuseService.php` — methods: `createLetter(array $data, User $actor)`, `approveLetter(int $id, User $actor)`, `rejectLetter(int $id, User $actor)`.
  - `RfidService.php` (optional) — methods: `processScan(array $payload)`, `enqueueAttendance(array $data)`.

- FormRequests (`app/Http/Requests`)
  - `StoreAttendanceRequest.php` — validation rules + `authorize()` verifies role and season.
  - `UpdateAttendanceRequest.php` — similar to store.
  - `StoreStudentExcuseLetterRequest.php`.

- Policies & Gates (`app/Policies` / `AuthServiceProvider`)
  - `AttendancePolicy` — methods: `view(User, AttendanceRecord)`, `create(User)`, `update(User, AttendanceRecord)`, `delete(User, AttendanceRecord)`. Use role checks as discussed.
  - Register `view-roster` and `manage-attendance` gates in `AuthServiceProvider`.

- Controllers & API Endpoints
  - `AttendanceController` (web) — index, show, create (call service), update, destroy; use FormRequests and policies.
  - `Api\AttendanceController` (if you need API endpoints for Chart.js or RFID) — JSON endpoints: `GET /api/attendance/aggregates`, `POST /api/rfid/scan`.

- Livewire Components (`app/Livewire/Attendance`)
  - `Index.php` + `index.blade.php` — roster listing with filters (date, batch, status) and pagination; call `Gate::authorize('view-roster')` and service for mass actions.
  - `Create.php` + `create.blade.php` — form for recording attendance; inject `AttendanceService` and call `recordAttendance`.
  - `Edit.php` + `edit.blade.php` — edit record modal; use `UpdateAttendanceRequest` rules.
  - `StudentsList.php`, `VolunteersList.php` — specialized filtered indices.
  - `AnalyticsDashboard.php` — loads aggregate datasets for Chart.js; can expose JSON API too.

- Jobs & Commands
  - `AggregateAttendanceJob` — compute daily aggregates; scheduled nightly in `Console\Kernel.php`.
  - `RecalculateAggregatesJob` — backfill when edits occur.
  - `ArchiveUsersByAbsenceJob` — optional archival.
  - Artisan command `attendance:recalculate` to trigger backfills.

- Events & Listeners
  - Event `AttendanceRecorded`, `AttendanceUpdated`, `AttendanceDeleted` and listeners to dispatch `RecalculateAggregatesJob` or update `attendance_aggregates`.

- Views / Frontend
  - Livewire blades under `resources/views/livewire/attendance/*`.
  - Chart.js widgets (vanilla, Vue, or React) under `resources/js/components/attendance/*` if used.

- Tests
  - Unit tests: `tests/Unit/Services/AttendanceServiceTest.php`, `StudentExcuseServiceTest.php`.
  - Feature tests: `tests/Feature/AttendancePolicyTest.php`, `AttendanceRecordCrudTest.php`.
  - Livewire tests: `tests/Feature/Livewire/AttendanceIndexTest.php`, `AttendanceCreateTest.php`.

- Routes
  - Web routes in `routes/web.php`: resource routes for attendance controllers and Livewire route mounts.
  - API routes in `routes/api.php`: `/api/attendance/aggregates`, `/api/rfid/scan` (protected by API key middleware).

- Misc
  - Add indexes and FK constraints in migrations as specified above.
  - Add model scopes: `scopeForDateRange`, `scopeForSession`, `scopeByStatus`.
  - Add casts for `date`, `time_in`, `time_out`, and decimal casts for `total_hours`.
  - Add policies and register them in `AuthServiceProvider`.

---


After you confirm this list is sufficient, I can scaffold any subset of these artifacts as example files in `docs/examples/` or generate real files under `app/`/`database/migrations` in this workspace. Pick which artifact set to generate first.

If you want, I can generate any of the artifacts below as non-applied example files in `docs/examples/`:
- Seeder + migrations for statuses and unique constraints
- `AttendanceService` skeleton with season check + compute hours
- `attendance_aggregates` migration + `AggregateAttendanceJob` pseudo-code
- RFID `scan_logs` migration + scan endpoint + processor

Pick which example files you want created and I'll add them to `docs/examples/`.

See also: the more detailed volunteer-focused design is in [docs/attendance-volunteer.md](docs/attendance-volunteer.md).
