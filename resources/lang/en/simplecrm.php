<?php

return [
    // General
    'general'               => 'General',
    'dashboard'             => 'Dashboard',
    'search'                => 'Search',
    'main_menu'             => 'Main Menu',
    'admin_menu'            => 'Admin Menu',
    'coming_soon'           => 'Coming Soon',
    'more_info'             => 'More Info',
    'jobs_singular'         => 'Job need to run',
    'jobs_prular'           => 'Jobs need to run',
    'language'              => 'Language',
    'login_info_title'      => 'Info',
    'login_info_text'       => 'Please login using',
    'profile'               => 'Profile',
    'save_changes'          => 'Save Changes',
    'timezone'              => 'Timezone',

    // Auth
    'sign_in'               => 'Sign In',
    'sign_in_message'       => 'Sign in to start your session',
    'sign_out'              => 'Sign Out',
    'remember_me'           => 'Remember me',
    'i_forgot_my_password'  => 'I forgot my password',
    'register'              => 'Register',
    'email'                 => 'Email',
    'password'              => 'Password',

    // Create Form
    'add'       => 'Add',
    'cancel'    => 'Cancel',

    // Edit Form
    'edit'      => 'Edit',
    'save'      => 'Save',

    // Show
    'show'          => 'Show',
    'created_at'    => 'Created At',
    'updated_at'    => 'Updated At',
    'deleted_at'    => 'Deleted At',
    'created_by_id' => 'Created By',
    'updated_by_id' => 'Updated By',

    // List
    'list'          => 'List',
    'actions'       => 'Actions',
    'back_to_all'   => 'Back to all',

    // Delete
    'delete'    => 'Delete',

    // Datatables
    'datatable' => [
        'export'            => 'Export',
        'column_visibility' => 'Column Visiblity',
        'info'              => 'Showing _START_ to _END_ of _TOTAL_ entries',
        'info_empty'        => 'No entries',
        'info_filtered'     => '(filtered from _MAX_ total entries)',
        'remove_filters'    => 'Remove filters',
    ],

    // Confirmation messages and bubbles
    'delete_confirmation_title'             => 'Are you sure?',
    'delete_confirmation_text'              => 'You will not be able to revert this!',
    'delete_confirmation_confirm_button'    => 'Yes, delete it!',
    'delete_confirmation_message'           => 'The item has been deleted successfully.',
    'insert_success'                        => 'The item has been added successfully.',
    'update_success'                        => 'The item has been modified successfully.',
    'login_successful'                      => 'Login successful',
    'reset_password_successful'             => 'Successfully reset password',

    // User CRUD
    'user' => [
        'title'             => 'Users',
        'title_singular'    => 'User',
    ],

    // Company CRUD
    'company' => [
        'title'                     => 'Companies',
        'title_singular'            => 'Company',
        'fields'                    => [
            'id'                    => 'ID',
            'name'                  => 'Name',
            'name_input'            => 'Enter name',
            'email'                 => 'Email',
            'email_input'           => 'Enter email',
            'logo'                  => 'Logo',
            'logo_input'            => 'Choose logo file',
            'logo_help_create'      => 'Minimum image size is 100x100.',
            'logo_help_edit'        => 'Minimum image size is 100x100. Upload image again to replace the current image.',
            'website_link'          => 'Website Link',
            'website_link_input'    => 'Enter website link',
            'no_logo'               => 'No Logo',
        ],
    ],

    // Employee CRUD
    'employee' => [
        'title'                             => 'Employees',
        'title_singular'                    => 'Employee',
        'fields'                            => [
            'id'                            => 'ID',
            'full_name'                     => 'Full Name',
            'full_name_input'               => 'Enter full name',
            'first_name'                    => 'First Name',
            'first_name_input'              => 'Enter first name',
            'last_name'                     => 'Last Name',
            'last_name_input'               => 'Enter last name',
            'company'                       => 'Company',
            'company_select'                => 'Choose company',
            'email'                         => 'Email',
            'email_input'                   => 'Enter email',
            'phone'                         => 'Phone',
            'phone_input'                   => 'Enter phone',
            'password'                      => 'Password',
            'password_input'                => 'Enter password',
            'password_confirmation'         => 'Password Confirmation',
            'password_confirmation_input'   => 'Enter password confirmation',
        ],
    ],

    // Admin Preference
    'preference' => [
        'title'             => 'Preferences',
        'choose_language'   => 'Choose language',
        'choose_timezone'   => 'Choose timezone',
        'update_success'    => 'Successfully saved changes',
        'update_error'      => 'An error occurred, please try again!',
    ]
];
