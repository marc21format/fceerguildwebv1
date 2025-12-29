<?php

return [
    'sections' => [
        'committee_memberships' => [
            'label' => 'Committee Memberships',
            'model' => App\Models\CommitteeMembership::class,
            'fields' => [
                'committee_id' => ['type' => 'select', 'label' => 'Committee', 'options' => 'committees', 'required' => true],
                'committee_position_id' => ['type' => 'select', 'label' => 'Position', 'options' => 'committee_positions', 'required' => true],
            ],
        ],
        'subject_teachers' => [
            'label' => 'Subject Assignments',
            'model' => App\Models\SubjectTeacher::class,
            'fields' => [
                'volunteer_subject_id' => ['type' => 'select', 'label' => 'Volunteer Subject', 'options' => 'volunteer_subjects', 'required' => true],
                'is_primary' => ['type' => 'checkbox', 'label' => 'Is Primary'],
            ],
        ],
        'classroom_responsibilities' => [
            'label' => 'Classroom Responsibilities',
            'model' => App\Models\ClassroomResponsibility::class,
            'fields' => [
                'classroom_id' => ['type' => 'select', 'label' => 'Classroom', 'options' => 'classrooms', 'required' => true],
                'classroom_position_id' => ['type' => 'select', 'label' => 'Position', 'options' => 'classroom_positions', 'required' => true],
                'note' => ['type' => 'textarea', 'label' => 'Note'],
            ],
        ],
        'fceer_profiles' => [
            'label' => 'FCEER Profile',
            'model' => App\Models\FceerProfile::class,
            'fields' => [
                'fceer_id' => ['type' => 'select', 'label' => 'FCEER', 'options' => 'fceer_batches', 'required' => true],
                'status' => ['type' => 'text', 'label' => 'Status', 'required' => true],
                'notes' => ['type' => 'textarea', 'label' => 'Notes'],
            ],
        ],
    ],
];