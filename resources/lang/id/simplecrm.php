<?php

return [
    // General
    'dashboard'             => 'Dasbor',
    'search'                => 'Cari',
    'main_menu'             => 'Menu Utama',

    // Auth
    'sign_in'               => 'Masuk',
    'sign_in_message'       => 'Masuk untuk memulai sesi anda',
    'sign_out'              => 'Keluar',
    'remember_me'           => 'Ingat saya',
    'i_forgot_my_password'  => 'Saya lupa password',

    // Create Form
    'add'       => 'Tambah',
    'cancel'    => 'Batal',

    // Edit Form
    'edit'      => 'Ubah',
    'save'      => 'Simpan',

    // Show
    'show'      => 'Lihat',

    // List
    'list'          => 'Daftar',
    'actions'       => 'Aksi',
    'back_to_all'   => 'Kembali ke semua',

    // Delete
    'delete'    => 'Hapus',

    // Confirmation messages and bubbles
    'delete_confirmation_title'             => 'Apakah anda yakin?',
    'delete_confirmation_text'              => 'Anda tidak akan dapat mengembalikan ini!',
    'delete_confirmation_confirm_button'    => 'Ya, hapus!',
    'delete_confirmation_message'           => 'Item telah berhasil dihapus.',

    // Company CRUD
    'company' => [
        'title'             => 'Perusahaan',
        'title_singular'    => 'Perusahaan',
        'fields'            => [
            'id'            => 'ID',
            'name'          => 'Nama',
            'email'         => 'Surel',
            'logo'          => 'Logo',
            'website_link'  => 'Tautan Situs Web',
            'no_logo'       => 'Tidak ada Logo',
        ],
    ],

    // Employee CRUD
    'employee' => [
        'title'             => 'Karyawan',
        'title_singular'    => 'Karyawan',
        'fields'            => [
            'id'            => 'ID',
            'full_name'     => 'Nama Lengkap',
            'first_name'    => 'Nama Depan',
            'last_name'     => 'Nama Belakang',
            'email'         => 'Surel',
            'phone'         => 'Telepon',
        ],
    ],
];
