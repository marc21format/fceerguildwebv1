# Application Modules — brief reference

Generated: 2025-12-18

This file lists the requested modules and a compact reference for their purpose, views/components, models, policies/gates and quick implementation notes.

## attendance_user
- Purpose: per-user attendance details and quick actions (self view, attachments, audits).
- Views / Livewire: `Attendance\Profile` (read-only for students/volunteers; expanded for managers).
- Models: `AttendanceRecord`, `AttendanceAudit`, `StudentExcuseLetter`, `Attachment`.
- Policies / Permissions: `view-attendance` (self), `manage-attendance` (scoped managers).
- Endpoints: `/attendance/{user}` (JSON), `/attendance/{user}/attachments`.
- Notes: enforce that regular users only access their own records; emit `AttendanceRecorded` events.

## attendance_students
- Purpose: student-facing attendance index and admin views for student attendance.
- Views / Livewire: `Attendance\Students\Index`, `Attendance\Students\ApplyExcuseModal`.
- Models: `AttendanceRecord`, `StudentExcuseLetter`, `AttendanceAggregate`.
- Policies / Permissions: student self-view, `volunteer_instructor` scoped marking, `volunteer_administrator` broader manage rights.
- Endpoints: `/api/attendance/students` (filters: date, season, group), `/api/attendance/students/{id}/excuses`.
- Notes: support AM/PM sessions and `absence_value` logic (late => 0.5).

## attendance_volunteer
- Purpose: volunteer attendance admin and roster-linked attendance tracking.
- Views / Livewire: `Attendance\Volunteers\Index`, `Attendance\Volunteers\Profile`.
- Models: `AttendanceRecord`, `AttendanceAggregate`, `Committee`, `CommitteeMember`.
- Policies / Permissions: `view-attendance` and `manage-attendance` for `volunteer_administrator`/`volunteer_executive`.
- Endpoints: `/api/attendance/volunteers`, `/api/attendance/volunteers/aggregates`.
- Notes: calculate `duration_minutes` for volunteer time-in/time-out records; audit all changes.

## roster_students
- Purpose: CRUD and roster listings for students (table, grouped, highschool views).
- Views / Livewire: `Roster\Students\Index`, `Roster\Students\Form` (modal), `Roster\Students\Profile`.
- Models: `User` (role=student), `UserProfile`, `FceerProfile`, `Highschool`, `Group`.
- Policies / Permissions: `view-roster` (scoped), `manage-volunteers` not applicable; `manage-roster` granted to admin/executive.
- Endpoints: `/api/rosters/students` (search, filters, pagination).
- Notes: reuse field-schema for form rendering; server-side validation for `student_number` uniqueness.

## roster_volunteers
- Purpose: CRUD and roster listings for volunteers, including committee/subject assignments.
- Views / Livewire: `Roster\Volunteers\Index`, `Roster\Volunteers\Form` (modal with dynamic assignment rows), `Roster\Volunteers\Profile`.
- Models: `User` (role=volunteer), `UserProfile`, `Committee`, `CommitteeMember`, `VolunteerSubject`, `SubjectTeacher`.
- Policies / Permissions: `manage-volunteers`, `manage-assignments` for `volunteer_administrator`/`volunteer_executive`.
- Endpoints: `/api/rosters/volunteers`, `/api/rosters/volunteers/assignments`.
- Notes: provide UI to add multiple committee/subject rows; centralize creation through `VolunteerService`.

## roster_users
- Purpose: general user roster (admins/operators) for viewing and impersonation (DB managers only).
- Views / Livewire: `Users\Roster` (list + actions), `Users\Impersonate` flow (server-side guarded).
- Models: `User`, `UserRole`, `UserProfile`, `Attachment`.
- Policies / Permissions: `manage-users` (database_manager for impersonate), `export-roster` for execs.
- Endpoints: `/api/rosters/users`.
- Notes: audit impersonation events and restrict `impersonate` to `database_manager` only.

## profile_volunteers
- Purpose: detailed profile editing and history for volunteer accounts (admin-managed and self-managed pieces).
- Views / Livewire: `Profile\Volunteers\Edit`, `Profile\Volunteers\History` (profile picture versions).
- Models: `UserProfile`, `ProfilePicture`, `Attachment`.
- Policies / Permissions: `manage-profiles` for administrators/executives; volunteers may edit allowed fields on own profile.
- Notes: implement `ProfileService` to manage versioned profile pictures and audit changes.

## profile_students
- Purpose: student profile view/edit (self-service + limited admin edits).
- Views / Livewire: `Profile\Students\Edit`, `Profile\Students\View`.
- Models: `UserProfile`, `FceerProfile`, `Attachment`.
- Policies / Permissions: students edit own profile; admins/executives may edit all.
- Notes: validate sensitive fields server-side; separate public vs private contact fields.

## profile_components
- Purpose: shared form UI fragments for profiles used by both students and volunteers.
- Components: `Form\Field` (text/select/date/file), `Form\AvatarUpload`, `Modal\Confirm`, `Profile\AddressBlock`.
- Usage: used by `Profile` and `Roster` modals to ensure consistent labels, validation and UX.
- Implementation note: drive component rendering from a canonical field-schema provider to keep front/back consistent.

---

If you want, I can now scaffold the model stubs and Livewire component files for these modules (starting with core models), or generate docs per module with component stubs. Which should I do next?
