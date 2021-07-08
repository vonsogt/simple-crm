<?php

return [
    // General
    'dashboard'             => 'Dashboard',
    'search'                => 'Search',
    'main_menu'             => 'Main Menu',
    'coming_soon'           => 'Coming Soon',
    'more_info'             => 'More Info',

    // Auth
    'sign_in'               => 'Sign In',
    'sign_in_message'       => 'Sign in to start your session',
    'sign_out'              => 'Sign Out',
    'remember_me'           => 'Remember me',
    'i_forgot_my_password'  => 'I forgot my password',

    // Create Form
    'add'       => 'Add',
    'cancel'    => 'Cancel',

    // Edit Form
    'edit'      => 'Edit',
    'save'      => 'Save',

    // Show
    'show'      => 'Show',

    // List
    'list'          => 'List',
    'actions'       => 'Actions',
    'back_to_all'   => 'Back to all',

    // Delete
    'delete'    => 'Delete',

    // Confirmation messages and bubbles
    'delete_confirmation_title'             => 'Are you sure?',
    'delete_confirmation_text'              => 'You will not be able to revert this!',
    'delete_confirmation_confirm_button'    => 'Yes, delete it!',
    'delete_confirmation_message'           => 'The item has been deleted successfully.',

    // User CRUD
    'user' => [
        'title'             => 'Users',
        'title_singular'    => 'User',
    ],

    // Company CRUD
    'company' => [
        'title'             => 'Companies',
        'title_singular'    => 'Company',
        'fields'            => [
            'id'            => 'ID',
            'name'          => 'Name',
            'email'         => 'Email',
            'logo'          => 'Logo',
            'website_link'  => 'Website Link',
            'no_logo'       => 'No Logo',
        ],
    ],

    // Employee CRUD
    'employee' => [
        'title'             => 'Employees',
        'title_singular'    => 'Employee',
        'fields'            => [
            'id'            => 'ID',
            'full_name'     => 'Full Name',
            'first_name'    => 'First Name',
            'last_name'     => 'Last Name',
            'email'         => 'Email',
            'phone'         => 'Phone',
        ],
    ],
];
