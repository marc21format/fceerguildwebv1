## Parent lookup tables and dependents

This file identifies parent (lookup) tables that other tables reference, and recommends an order for creating and seeding them to avoid foreign-key issues.

Guideline: create and seed parent lookup tables first, then child tables that reference them.

1) Core geographic lookups
- `provinces` — children: `cities`, `addresses`
- `cities` — children: `barangays`, `addresses`
- `barangays` — children: `addresses`

Recommended order: `provinces` -> `cities` -> `barangays` -> `addresses`

2) Degree / education lookups
- `degree_levels` — children: `degree_fields`, `degree_programs`
- `degree_types` — children: `degree_programs`
- `degree_fields` — children: `degree_programs`
- `degree_programs` — depends on levels/types/fields

Recommended order: `degree_levels` -> `degree_types` -> `degree_fields` -> `degree_programs`

3) Highschool lookups
- `highschools` — children: `highschool_records`
- `highschool_subjects` — children: `highschool_subject_records` (subject mappings)

Recommended order: `highschools` -> `highschool_subjects` -> related records

4) User/profile/roster lookups
- `user_roles` — children: `users` (users.role_id)
- `fceer_batches` — children: `fceer_profiles`, `user_profiles` (batch_id)
- `classrooms` — children: `fceer_profiles`, `user_profiles` (student_group_id)
- `user_attendance_statuses` — children: `attendance_records`, `user_profiles` (status_id)
- `review_seasons` — children: `attendance_records`

Recommended order: `user_roles`, `fceer_batches`, `classrooms`, `user_attendance_statuses`, `review_seasons`

5) Attachment / media
- `attachments` — referenced by `profile_pictures`, `student_excuse_letters`, and other attachable records

Recommended: create `attachments` early (before `profile_pictures` and any tables that add `attachment_id` FKs).

6) Professional / misc lookups
- `fields_of_work` — referenced by profiles/positions/etc.
- `positions`, `committees`, `committee_positions`, `committee_members` — positions/committees are parents for committee_members
- `prefix_titles`, `suffix_titles` — referenced by `professional_credentials`
- `volunteer_subjects` — referenced by `subject_teachers` / volunteer mappings
- `universities` — referenced by educational records

Recommended order: `fields_of_work`, `positions`, `committees`, `committee_positions`, `prefix_titles`, `suffix_titles`, `volunteer_subjects`, `universities`

7) Notes and next steps
- This list was derived from the migration constraints (`->constrained(...)`) in `database/migrations/`.
- If you plan to run migrations against an empty DB, follow the recommended order and run seeders for each lookup table before running dependent migrations (or run all migrations then seed in this order if FK constraints are deferred by your DB).
- I can generate small JSON fixtures and seeders for each parent lookup (e.g. provinces -> cities -> barangays), or produce an ordered migration plan script. Which would you prefer next?
