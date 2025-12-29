<?php

return [
    'fields' => [
        'current_password' => ['type' => 'password', 'label' => 'Current Password', 'required' => true],
        'password' => ['type' => 'password', 'label' => 'New Password', 'required' => true, 'min' => 8],
        'password_confirmation' => ['type' => 'password', 'label' => 'Confirm Password', 'required' => true],
    ],
    'permissions' => ['update' => 'update'],
];