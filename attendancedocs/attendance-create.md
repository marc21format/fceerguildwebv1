# Attendance / Create — Record Attendance UI & Form

Purpose
- Single-record and scan-based entry UI for creating or updating an `AttendanceRecord`.
- Support both manual entry and scanned ID input (keyboard-emulated scanner).

Fields & behavior
- Common fields: `user_id` (search/scan), `date`, `session` (student-only: `AM|PM`), `time_in`, `time_out`, `status_id`, `notes`, `recorded_by_id`.
- Volunteer flow: show `time_in` and optional `time_out`; compute `total_hours` from timestamps.
- Student flow: require `session`; `time_out` optional for `AM/PM` semantics; prevent `time_in` duplication via unique check.

Validation (FormRequest)
- `StoreAttendanceRequest` rules:
  - `user_id`: required, exists:users,id
  - `date`: required|date
  - `session`: required_for_students|in:AM,PM,FULL
  - `time_in`: required_without:status_id|date_format:H:i
  - `status_id`: required_when_no_time
  - `notes`: sometimes|string|max:1000

UX details
- Scan box autofocus with debounce; when scan value matches a user, auto-fill and submit (if configured).
- Present inline validation errors and success toast on save.
- For rapid scanning flows, allow `auto-advance` to next expected user.
- Show `season` warning if selected `date` is outside active `ReviewSeason` and disable edits.

Service interaction
- Controller/Livewire should call `AttendanceService::recordAttendance($data, $actor)` to centralize logic: uniqueness checks, season enforcement, `status_id` resolution and `total_hours` computation.

Livewire component structure
- `app/Livewire/Attendance/Create`
  - Props: `public ?int $user_id`, `public string $date`, `public ?string $session`, `public string $scanInput`.
  - Methods: `mount()`, `onScan()`, `save()`, `resetForm()`.
  - Authorization: `authorize()` via `StoreAttendanceRequest` or Gate check in `save()`.

Testing
- Unit test `AttendanceService::recordAttendance` for student vs volunteer rules.
- Livewire test for `Attendance/Create` scanning flow and manual save.

Implementation priorities
1. Implement `StoreAttendanceRequest` and `AttendanceService::recordAttendance`.
2. Create Livewire `Attendance/Create` with scan autofocus flow.
3. Add UI toggle for `auto-submit` when using a scanner.
