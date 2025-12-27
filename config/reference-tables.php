<?php

return [
    // Centralized field definitions for reference / lookup tables.
    // Add entries here and reference via `config('reference-tables.{key}')` from views.

    'provinces' => [
        [
            'key' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
    ],

    'cities' => [
        [
            'key' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        [
            'key' => 'province_id',
            'label' => 'Province',
            'type' => 'select',
            'options' => fn() => \App\Models\Province::pluck('name', 'id')->toArray(),
            'rules' => 'required|exists:provinces,id',
        ],
    ],

    'barangays' => [
        [
            'key' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        [
            'key' => 'city_id',
            'label' => 'City',
            'type' => 'select',
            'options' => fn() => \App\Models\City::pluck('name', 'id')->toArray(),
            'rules' => 'required|exists:cities,id',
        ],
    ],

    'degree_fields' => [
        [
            'key' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        [
            'key' => 'abbreviation',
            'label' => 'Abbreviation',
            'type' => 'text',
            'rules' => 'nullable|string|max:50',
        ],
    ],

    'degree_levels' => [
        [
            'key' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        [
            'key' => 'abbreviation',
            'label' => 'Abbreviation',
            'type' => 'text',
            'rules' => 'nullable|string|max:50',
        ],
    ],

    'degree_programs' => [
        [
            'key' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        [
            'key' => 'abbreviation',
            'label' => 'Abbreviation',
            'type' => 'text',
            'rules' => 'nullable|string|max:50',
        ],
        [
            'key' => 'degree_level_id',
            'label' => 'Degree Level',
            'type' => 'select',
            'options' => fn() => \App\Models\DegreeLevel::pluck('name', 'id')->toArray(),
            'rules' => 'required|exists:degree_levels,id',
        ],
        [
            'key' => 'degree_type_id',
            'label' => 'Degree Type',
            'type' => 'select',
            'options' => fn() => \App\Models\DegreeType::pluck('name', 'id')->toArray(),
            'rules' => 'required|exists:degree_types,id',
        ],
        [
            'key' => 'degree_field_id',
            'label' => 'Degree Field',
            'type' => 'select',
            'options' => fn() => \App\Models\DegreeField::pluck('name', 'id')->toArray(),
            'rules' => 'required|exists:degree_fields,id',
        ],
    ],

    'degree_types' => [
        [
            'key' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        [
            'key' => 'abbreviation',
            'label' => 'Abbreviation',
            'type' => 'text',
            'rules' => 'nullable|string|max:50',
        ],
    ],
    
    'universities' => [
        [
            'key' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'rules' => 'required|string|max:255',
        ],
        [
            'key' => 'abbreviation',
            'label' => 'Abbreviation',
            'type' => 'text',
            'rules' => 'nullable|string|max:50',
        ],
    ],

    // Example placeholder for another reference table:
    // 'categories' => [ ['key'=>'title','label'=>'Title','type'=>'text','rules'=>'required|string|max:255'] ],
];
