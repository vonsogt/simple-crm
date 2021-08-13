<?php

return [
    // General
    'general'               => 'Umum',
    'dashboard'             => 'Dasbor',
    'search'                => 'Cari',
    'main_menu'             => 'Menu Utama',
    'admin_menu'            => 'Menu Admin',
    'coming_soon'           => 'Segera Hadir',
    'more_info'             => 'Info lebih lanjut',
    'jobs_singular'         => 'Tugas yang harus dijalankan',
    'jobs_prular'           => 'Tugas yang harus dijalankan',
    'language'              => 'Bahasa',
    'login_info_title'      => 'Info',
    'login_info_text'       => 'Silahkan masuk menggunakan',
    'profile'               => 'Profil',
    'save_changes'          => 'Simpan Perubahan',
    'timezone'              => 'Zona waktu',

    // Auth
    'sign_in'               => 'Masuk',
    'sign_in_message'       => 'Masuk untuk memulai sesi anda',
    'sign_out'              => 'Keluar',
    'remember_me'           => 'Ingat saya',
    'i_forgot_my_password'  => 'Saya lupa kata sandi',
    'register'              => 'Daftar',
    'email'                 => 'Email',
    'password'              => 'Kata sandi',

    // Create Form
    'add'       => 'Tambah',
    'cancel'    => 'Batal',

    // Edit Form
    'edit'      => 'Ubah',
    'save'      => 'Simpan',

    // Show
    'show'      => 'Lihat',
    'created_at'    => 'Dibuat Pada',
    'updated_at'    => 'Diubah Pada',
    'deleted_at'    => 'Dihapus Pada',
    'created_by_id' => 'Dibuat Oleh',
    'updated_by_id' => 'Diubah Oleh',

    // List
    'list'          => 'Daftar',
    'actions'       => 'Aksi',
    'back_to_all'   => 'Kembali ke semua',

    // Delete
    'delete'    => 'Hapus',

    // Datatables
    'datatable' => [
        'export'            => 'Ekspor',
        'column_visibility' => 'Visibilitas Kolom',
        'info'              => 'Menampilkan _START_ hingga _END_ dari _TOTAL_ entrian',
        'info_empty'        => 'Tidak ada entri',
        'info_filtered'     => '(difilter dari _MAX_ total entri)',
        'remove_filters'    => 'Hapus filter',
    ],

    // Confirmation messages and bubbles
    'delete_confirmation_title'             => 'Apakah anda yakin?',
    'delete_confirmation_text'              => 'Anda tidak akan dapat mengembalikan ini!',
    'delete_confirmation_confirm_button'    => 'Ya, hapus!',
    'delete_confirmation_message'           => 'Item telah berhasil dihapus.',
    'insert_success'                        => 'Item telah berhasil ditambahkan.',
    'update_success'                        => 'Item telah berhasil diubah.',
    'login_successful'                      => 'Berhasil masuk',
    'reset_password_successful'             => 'Berhasil mengatur ulang kata sandi',

    // User CRUD
    'user' => [
        'title'             => 'Pengguna',
        'title_singular'    => 'Pengguna',
    ],

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
        'title'                             => 'Karyawan',
        'title_singular'                    => 'Karyawan',
        'fields'                            => [
            'id'                            => 'ID',
            'full_name'                     => 'Nama Lengkap',
            'full_name_input'               => 'Masukkan nama lengkap',
            'first_name'                    => 'Nama Depan',
            'first_name_input'              => 'Masukkan nama depan',
            'last_name'                     => 'Nama Belakang',
            'last_name_input'               => 'Masukkan nama belakang',
            'company'                       => 'Perusahan',
            'company_select'                => 'Pilih perusahaan',
            'email'                         => 'Surel',
            'email_input'                   => 'Masukkan surel',
            'phone'                         => 'Telepon',
            'phone_input'                   => 'Masukkan telepon',
            'password'                      => 'Kata Sandi',
            'password_input'                => 'Masukkan kata sandi',
            'password_confirmation'         => 'Konfirmasi Kata Sandi',
            'password_confirmation_input'   => 'Masukkan konfirmasi kata sandi',
        ],
    ],

    // Admin Preference
    'preference' => [
        'title'             => 'Preferensi',
        'choose_language'   => 'Pilih bahasa',
        'choose_timezone'   => 'Pilih zona waktu',
        'update_success'    => 'Berhasil menyimpan perubahan',
        'update_error'      => 'Terjadi kesalahan, silahkan coba lagi!',
    ]
];
