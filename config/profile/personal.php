<?php

return [
    'model' => \App\Models\UserProfile::class,
    'fields' => [
        'first_name' => ['type' => 'text', 'label' => 'First Name', 'required' => true, 'max' => 100],
        'middle_name' => ['type' => 'text', 'label' => 'Middle Name', 'max' => 100],
        'suffix_name' => ['type' => 'text', 'label' => 'Suffix Name', 'max' => 50],
        'lived_name' => ['type' => 'text', 'label' => 'Lived Name', 'max' => 100],
        'generational_suffix' => ['type' => 'text', 'label' => 'Generational Suffix', 'max' => 50],
        'phone_number' => ['type' => 'text', 'label' => 'Phone Number', 'max' => 20],
        'birthday' => ['type' => 'date', 'label' => 'Birthday', 'required' => true],
        'sex' => ['type' => 'select', 'label' => 'Sex', 'options' => ['M' => 'Male', 'F' => 'Female', 'O' => 'Other'], 'required' => true],
        'address_id' => ['type' => 'select', 'label' => 'Address', 'options' => 'addresses', 'required' => true],
    ],
    'permissions' => ['view' => 'view', 'update' => 'update'],
];