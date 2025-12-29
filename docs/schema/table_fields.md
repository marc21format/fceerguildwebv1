1. addresses
Columns:
id bigint UN AI PK 
house_number varchar(50) 
street varchar(255) 
barangay_id bigint UN 
city_id bigint UN 
province_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

2. attendance_audits
Columns:
id bigint UN AI PK 
attendance_record_id bigint UN 
changed_by_id bigint UN 
action varchar(100) 
previous json 
changes json 
note text 
created_at timestamp 
updated_at timestamp

3. attendance_record_excuse_letter
Columns:
id bigint UN AI PK 
attendance_record_id bigint UN 
student_excuse_letter_id bigint UN 
created_at timestamp 
updated_at timestamp

4. attendance_records
Columns:
id bigint UN AI PK 
user_id bigint UN 
date date 
time time 
time_in time 
time_out time 
duration_minutes int 
session enum('AM','PM') 
absence_value decimal(4,2) 
review_season_id bigint UN 
status_id bigint UN 
recorded_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

5. attendance_records_letter
Columns:
id bigint UN AI PK 
attendance_record_id bigint UN 
student_excuse_letter_id bigint UN 
created_at timestamp 
updated_at timestamp

6. attachments
Columns:
id bigint UN AI PK 
attachable_type varchar(255) 
attachable_id bigint UN 
disk varchar(50) 
path varchar(1024) 
original_filename varchar(255) 
mime_type varchar(100) 
size int 
uploaded_by_id bigint UN 
metadata json 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

7. barangays
Columns:
id bigint UN AI PK 
city_id bigint UN 
name varchar(255) 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

8. committee_members
Table: committee_members
Columns:
id bigint UN AI PK 
user_id bigint UN 
committee_id bigint UN 
position_id bigint UN 
created_at timestamp 
updated_at timestamp

9. committee_positions
Columns:
id bigint UN AI PK 
position_id bigint UN 
committee_id bigint UN 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

10. committees
Table: committees
Columns:
id bigint UN AI PK 
name varchar(255) 
description varchar(255) 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

11. cities
Columns:
id bigint UN AI PK 
name varchar(255) 
province_id bigint UN 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

12. degree_fields
Columns:
id bigint UN AI PK 
name varchar(255) 
abbreviation varchar(50) 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

13. degree_levels
Columns:
id bigint UN AI PK 
name varchar(100) 
level smallint 
abbreviation varchar(50) 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

14. degree_programs
Columns:
id bigint UN AI PK 
name varchar(255) 
abbreviation varchar(50) 
degree_level_id bigint UN 
degree_type_id bigint UN 
degree_field_id bigint UN 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

15. degree_types
Columns:
id bigint UN AI PK 
degree_level_id bigint UN 
name varchar(255) 
abbreviation varchar(50) 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

16. educational_records
Columns:
id bigint UN AI PK 
user_id bigint UN 
degree_program_id bigint UN 
year_started smallint 
university_id bigint UN 
year_graduated smallint 
dost_scholarship tinyint(1) 
latin_honor varchar(100) 
created_at timestamp 
updated_at timestamp

17. fceer_batches
Columns:
id bigint UN AI PK 
batch_no int 
year smallint 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

18. fceer_profiles
Columns:
id bigint UN AI PK 
user_id bigint UN 
volunteer_number varchar(50) 
student_number varchar(50) 
batch_id bigint UN 
student_group_id bigint UN 
created_at timestamp 
updated_at timestamp

19. fields_of_work
Columns:
id bigint UN AI PK 
name varchar(255) 
created_by_id bigint UN 
updated_by_id bigint UN 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

20. highschool_records
Columns:
id bigint UN AI PK 
user_id bigint UN 
highschool_id bigint UN 
year_started smallint 
level varchar(50) 
year_ended smallint 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp

21. highschool_subject_records
- highschool_subjects
- highschools
- positions
- prefix_titles
- profile_pictures
- professional_credentials
- provinces
- classrooms
- review_seasons
- student_excuse_letters
- suffix_titles
- subject_teachers
- user_attendance_statuses
- user_profiles
- user_roles
- users
- universities
- volunteer_subjects
