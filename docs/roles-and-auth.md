# Roles, Permissions & Views

Generated: 2025-12-18

This document lists the application's primary roles, the permissions/gates they should have, and the frontend views they can access. Use these as a reference when implementing policies, gates, or integrating `spatie/laravel-permission`.

**Roles**
- `database_manager` — highest privileged user for DB/ops. Can impersonate, manage users/roles, and run destructive/admin tasks.
- `admin` — full application admin: manage rosters, attendance, settings, files, and seed data (but not necessarily DB ops/impersonation).
- `roster_manager` — manage Students & Volunteers (create/edit), view rosters and run roster exports.
- `attendance_manager` — manage attendance records, apply/approve excuse letters, run aggregate recalculations.
- `committee_lead` / `position_holder` — limited management within a committee (view roster, assign members for their committee).
- `volunteer` — regular volunteer account (can access volunteer roster limited view, own profile, and check-in/out UI where allowed).
- `student` — student account (own profile, view personal attendance, restricted roster access if allowed for peer lists).
- `viewer` / `staff` — read-only access to rosters or dashboards as assigned.
- `guest` — unauthenticated or minimal access; typically cannot view rosters or attendance.

**Recommended gates/permissions**
- `impersonate` — only `database_manager` should have this. Enforced server-side.
- `manage-users` — create/update/delete users and roles (admin/database_manager).
- `view-roster` — view any roster (roster_manager, admin, attendance_manager, committee_lead as scoped).
- `manage-roster` — add/edit/remove roster entries (roster_manager, admin).
- `view-attendance` — view attendance rosters and records (attendance_manager, admin, roster_manager, committee_lead for scoped views).
- `manage-attendance` — create/update attendance, apply excuse letters, and revert changes (attendance_manager, admin).
- `apply-excuse` — approve/apply excuse letters to records (attendance_manager, admin).
- `manage-attachments` — upload/delete attachments (admin, roster_manager for their domain).
- `manage-profiles` — update `user_profiles` for others (admin, roster_manager).
- `export-roster` — export CSV/Excel (roster_manager, admin).

**Views / UI areas mapped to roles**
- Dashboard
  - `admin`, `database_manager`, `roster_manager`, `attendance_manager`, `viewer` (role-dependent widgets)
- User Roster (`Users/Roster`)
  - Access: `admin`, `database_manager`, `roster_manager` (view/edit). `database_manager` only for `impersonate` action.
  - Actions: `Edit`, `View`, `Login as` (impersonate restricted to `database_manager`)
- Student Roster (`Roster/Students`) — see `docs/student-roster.md`
  - Access: `roster_manager`, `admin`, `attendance_manager`, `committee_lead` (scoped), `viewer` (read-only)
  - Actions: `Add Student` modal (roster_manager/admin), open `Profile`, quick attendance actions (attendance_manager)
- Volunteer Roster (`Roster/Volunteers`) — see `docs/volunteer-roster.md`
  - Access: `roster_manager`, `admin`, `attendance_manager`, `committee_lead` (scoped)
  - Actions: `Add Volunteer` modal, manage committee/subject assignments (roster_manager/admin)
- Attendance Admin (`Attendance/Index`) — admin roster view
  - Access: `attendance_manager`, `admin`, `roster_manager` (restricted)
  - Actions: mark attendance, apply excuse letters, view history/audits
- Attendance Profile (`Attendance/Profile`) — per-user attendance history
  - Access: user themselves (`student`/`volunteer`), `attendance_manager`, `admin`, `roster_manager` (scoped)
- Profile page / Edit (`Profile`) — personal profile
  - Access: all authenticated users for their own profile; `manage-profiles` permission for editing others
- Settings & Reference Data (committees, positions, subjects)
  - Access: `admin`, `roster_manager` (manage reference lists)
- Attachments viewer / management
  - Access: `admin`, `manage-attachments` holders, and owners of the resource (e.g., student owning their own attachments)

**UI rules & enforcement**
- Always enforce permissions server-side via policies/gates; hide UI actions client-side when the current user lacks permission for better UX but never rely on UI hiding.
- Scope `committee_lead` and similar roles to committee/position via policy checks (e.g., `RosterPolicy@view` should accept an optional `committee_id` scope).
- `impersonate` must log an audit entry and be limited to secure environments or specific roles.

# Roles, Permissions & Views

Generated: 2025-12-18

Only the canonical roles below are supported by policy and seeding guidance in this document.

**Canonical roles**
- `database_manager`
- `volunteer_executive` (executive)
- `volunteer_administrator` (administrator)
- `volunteer_instructor` (instructor)
- `student`
- `guest`

## Role capability matrix (Attendance | Profile | Roster)

Each role below is broken into three capability areas: `Attendance`, `Profile`, and `Roster`.

- `database_manager`
  - Attendance: view overall attendance dashboards for students and volunteers, view individual attendance records, create and edit any attendance records.
  - Profile: view and edit all user profiles across the system.
  - Roster: view, add, and edit all student and volunteer roster entries; impersonate users; export rosters to CSV/Excel.

- `volunteer_executive` (executive)
  - Attendance: same as `database_manager` for viewing and exporting aggregated and individual attendance within the volunteer domain.
  - Profile: view and edit volunteer and (where scoped) student profiles.
  - Roster: manage volunteer roster (create/edit), manage assignments, and export rosters; cannot impersonate.

- `volunteer_administrator` (administrator)
  - Attendance: same as `volunteer_executive` (view and manage within assigned scope; apply/approve excuse letters where permitted).
  - Profile: view and edit profiles within their scope; manage attachments for those users.
  - Roster: add/edit volunteers and assignments; export scoped rosters; cannot impersonate.

- `volunteer_instructor` (instructor)
  - Attendance: limited to their assigned participants — view and mark attendance for scoped students/volunteers; view individual histories for scoped users.
  - Profile: view profiles of their assigned participants; minimal profile edits (contact info) only for scoped users.
  - Roster: read-only view of rosters relevant to their assignments; cannot add/delete users and cannot view overall attendance dashboards.

- `student`
  - Attendance: view own attendance history and related attachments/documents only.
  - Profile: view and edit own profile; upload personal attachments where allowed.
  - Roster: limited, read-only view of classmates or group lists; cannot add/edit roster entries.

- `guest`
  - Attendance: no access to attendance data.
  - Profile: no access to user profiles (except public pages, if any).
  - Roster: cannot view rosters (may see public summaries if provided).

## Notes
- Enforce all capabilities via server-side policies/gates. Client-side hiding of UI elements is UX-only and not a substitute for authorization checks.
- `impersonate` remains strictly limited to `database_manager`.

If you'd like, I can now scaffold a seeder that creates these roles and the minimal permissions mapping, or generate `RosterPolicy` and `AttendancePolicy` classes wired into `AuthServiceProvider`.

## Specific rules

- Student excuse letters:
  - Students may create student excuse letters only for their own attendance records. Policies must enforce that the `student_id` on the excuse matches `auth()->id()` (or the authenticated user's `user_id`) when creating an excuse.
  - `volunteer_instructor`, `volunteer_administrator`, `volunteer_executive`, and `database_manager` may view and (where authorized) apply/approve or attach administrative notes to excuse letters, but students cannot create excuses for other users.

- Profile editing scope:
  - `student` and `volunteer_instructor` can create and edit only their own profile entries (i.e., `UserProfile` records tied to `auth()->id()`), including uploading personal attachments.
  - `volunteer_administrator`, `volunteer_executive`, and `database_manager` can view and edit any user's profile.
  - All edits that alter sensitive fields (roles, permissions, `is_active`, impersonation flags) must be restricted to `volunteer_executive` and `database_manager` and audited.

Implement these rules in `AttendancePolicy` and `UserPolicy` (e.g., `createExcuseLetter`, `applyExcuse`, `updateProfile`) and ensure Livewire actions call `Gate::authorize(...)` before mutating state.

