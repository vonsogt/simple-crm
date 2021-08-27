<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageLinesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $language_lines = array(
            0 =>
            array(
                'id' => 1,
                'group' => 'simplecrm',
                'key' => 'general',
                'text' => '{"en":"General","id":"Umum"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            1 =>
            array(
                'id' => 2,
                'group' => 'simplecrm',
                'key' => 'dashboard',
                'text' => '{"en":"Dashboard","id":"Dasbor"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            2 =>
            array(
                'id' => 3,
                'group' => 'simplecrm',
                'key' => 'search',
                'text' => '{"en":"Search","id":"Cari"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            3 =>
            array(
                'id' => 4,
                'group' => 'simplecrm',
                'key' => 'main_menu',
                'text' => '{"en":"Main Menu","id":"Menu Utama"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            4 =>
            array(
                'id' => 5,
                'group' => 'simplecrm',
                'key' => 'admin_menu',
                'text' => '{"en":"Admin Menu","id":"Menu Admin"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            5 =>
            array(
                'id' => 6,
                'group' => 'simplecrm',
                'key' => 'coming_soon',
                'text' => '{"en":"Coming Soon","id":"Segera Hadir"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            6 =>
            array(
                'id' => 7,
                'group' => 'simplecrm',
                'key' => 'more_info',
                'text' => '{"en":"More Info","id":"Info lebih lanjut"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            7 =>
            array(
                'id' => 8,
                'group' => 'simplecrm',
                'key' => 'jobs_singular',
                'text' => '{"en":"Job need to run","id":"Tugas yang harus dijalankan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            8 =>
            array(
                'id' => 9,
                'group' => 'simplecrm',
                'key' => 'jobs_prular',
                'text' => '{"en":"Jobs need to run","id":"Tugas yang harus dijalankan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            9 =>
            array(
                'id' => 10,
                'group' => 'simplecrm',
                'key' => 'language',
                'text' => '{"en":"Language","id":"Bahasa"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            10 =>
            array(
                'id' => 11,
                'group' => 'simplecrm',
                'key' => 'login_info_title',
                'text' => '{"en":"Info","id":"Info"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            11 =>
            array(
                'id' => 12,
                'group' => 'simplecrm',
                'key' => 'login_info_text',
                'text' => '{"en":"Please login using","id":"Silahkan masuk menggunakan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            12 =>
            array(
                'id' => 13,
                'group' => 'simplecrm',
                'key' => 'profile',
                'text' => '{"en":"Profile","id":"Profil"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            13 =>
            array(
                'id' => 14,
                'group' => 'simplecrm',
                'key' => 'save_changes',
                'text' => '{"en":"Save Changes","id":"Simpan Perubahan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            14 =>
            array(
                'id' => 15,
                'group' => 'simplecrm',
                'key' => 'timezone',
                'text' => '{"en":"Timezone","id":"Zona waktu"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            15 =>
            array(
                'id' => 16,
                'group' => 'simplecrm',
                'key' => 'import',
                'text' => '{"en":"Import","id":"Impor"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            16 =>
            array(
                'id' => 17,
                'group' => 'simplecrm',
                'key' => 'sign_in',
                'text' => '{"en":"Sign In","id":"Masuk"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            17 =>
            array(
                'id' => 18,
                'group' => 'simplecrm',
                'key' => 'sign_in_message',
                'text' => '{"en":"Sign in to start your session","id":"Masuk untuk memulai sesi anda"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            18 =>
            array(
                'id' => 19,
                'group' => 'simplecrm',
                'key' => 'sign_out',
                'text' => '{"en":"Sign Out","id":"Keluar"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            19 =>
            array(
                'id' => 20,
                'group' => 'simplecrm',
                'key' => 'remember_me',
                'text' => '{"en":"Remember me","id":"Ingat saya"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            20 =>
            array(
                'id' => 21,
                'group' => 'simplecrm',
                'key' => 'i_forgot_my_password',
                'text' => '{"en":"I forgot my password","id":"Saya lupa kata sandi"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            21 =>
            array(
                'id' => 22,
                'group' => 'simplecrm',
                'key' => 'register',
                'text' => '{"en":"Register","id":"Daftar"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            22 =>
            array(
                'id' => 23,
                'group' => 'simplecrm',
                'key' => 'email',
                'text' => '{"en":"Email","id":"Email"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            23 =>
            array(
                'id' => 24,
                'group' => 'simplecrm',
                'key' => 'password',
                'text' => '{"en":"Password","id":"Kata sandi"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            24 =>
            array(
                'id' => 25,
                'group' => 'simplecrm',
                'key' => 'add',
                'text' => '{"en":"Add","id":"Tambah"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            25 =>
            array(
                'id' => 26,
                'group' => 'simplecrm',
                'key' => 'cancel',
                'text' => '{"en":"Cancel","id":"Batal"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            26 =>
            array(
                'id' => 27,
                'group' => 'simplecrm',
                'key' => 'close',
                'text' => '{"en":"Close","id":"Tutup"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            27 =>
            array(
                'id' => 28,
                'group' => 'simplecrm',
                'key' => 'edit',
                'text' => '{"en":"Edit","id":"Ubah"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            28 =>
            array(
                'id' => 29,
                'group' => 'simplecrm',
                'key' => 'save',
                'text' => '{"en":"Save","id":"Simpan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            29 =>
            array(
                'id' => 30,
                'group' => 'simplecrm',
                'key' => 'show',
                'text' => '{"en":"Show","id":"Lihat"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            30 =>
            array(
                'id' => 31,
                'group' => 'simplecrm',
                'key' => 'created_at',
                'text' => '{"en":"Created At","id":"Dibuat Pada"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            31 =>
            array(
                'id' => 32,
                'group' => 'simplecrm',
                'key' => 'updated_at',
                'text' => '{"en":"Updated At","id":"Diubah Pada"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            32 =>
            array(
                'id' => 33,
                'group' => 'simplecrm',
                'key' => 'deleted_at',
                'text' => '{"en":"Deleted At","id":"Dihapus Pad"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            33 =>
            array(
                'id' => 34,
                'group' => 'simplecrm',
                'key' => 'created_by_id',
                'text' => '{"en":"Created By","id":"Dibuat Oleh"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            34 =>
            array(
                'id' => 35,
                'group' => 'simplecrm',
                'key' => 'updated_by_id',
                'text' => '{"en":"Updated By","id":"Diubah Oleh"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            35 =>
            array(
                'id' => 36,
                'group' => 'simplecrm',
                'key' => 'list',
                'text' => '{"en":"List","id":"Daftar"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            36 =>
            array(
                'id' => 37,
                'group' => 'simplecrm',
                'key' => 'actions',
                'text' => '{"en":"Actions","id":"Aksi"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            37 =>
            array(
                'id' => 38,
                'group' => 'simplecrm',
                'key' => 'back_to_all',
                'text' => '{"en":"Back to all","id":"Kembali ke semua"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            38 =>
            array(
                'id' => 39,
                'group' => 'simplecrm',
                'key' => 'import_excel',
                'text' => '{"en":"Import Excel","id":"Impor Excel"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            39 =>
            array(
                'id' => 40,
                'group' => 'simplecrm',
                'key' => 'import_excel_input',
                'text' => '{"en":"Choose excel file","id":"Pilih file excel"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            40 =>
            array(
                'id' => 41,
                'group' => 'simplecrm',
                'key' => 'import_excel_help',
                'text' => '{"en":"The file extension must be: csv,xls,xlsx","id":"Ekstensi file harus: csv,xls,xlsx"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            41 =>
            array(
                'id' => 42,
                'group' => 'simplecrm',
                'key' => 'delete',
                'text' => '{"en":"Delete","id":"Hapus"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            42 =>
            array(
                'id' => 43,
                'group' => 'simplecrm.datatable',
                'key' => 'export',
                'text' => '{"en":"Export","id":"Ekspor"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            43 =>
            array(
                'id' => 44,
                'group' => 'simplecrm.datatable',
                'key' => 'column_visibility',
                'text' => '{"en":"Column Visiblity","id":"Visibilitas Kolom"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            44 =>
            array(
                'id' => 45,
                'group' => 'simplecrm.datatable',
                'key' => 'info',
                'text' => '{"en":"Showing _START_ to _END_ of _TOTAL_ entries","id":"Menampilkan _START_ hingga _END_ dari _TOTAL_ entrian"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            45 =>
            array(
                'id' => 46,
                'group' => 'simplecrm.datatable',
                'key' => 'info_empty',
                'text' => '{"en":"No entries","id":"Tidak ada entri"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            46 =>
            array(
                'id' => 47,
                'group' => 'simplecrm.datatable',
                'key' => 'info_filtered',
                'text' => '{"en":"(filtered from _MAX_ total entries)","id":"(difilter dari _MAX_ total entri)"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            47 =>
            array(
                'id' => 48,
                'group' => 'simplecrm.datatable',
                'key' => 'remove_filters',
                'text' => '{"en":"Remove filters","id":"Hapus filter"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            48 =>
            array(
                'id' => 49,
                'group' => 'simplecrm',
                'key' => 'delete_confirmation_title',
                'text' => '{"en":"Are you sure?","id":"Apakah anda yakin?"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            49 =>
            array(
                'id' => 50,
                'group' => 'simplecrm',
                'key' => 'delete_confirmation_text',
                'text' => '{"en":"You will not be able to revert this!","id":"Anda tidak akan dapat mengembalikan ini!"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            50 =>
            array(
                'id' => 51,
                'group' => 'simplecrm',
                'key' => 'delete_confirmation_confirm_button',
                'text' => '{"en":"Yes, delete it!","id":"Ya, hapus!"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            51 =>
            array(
                'id' => 52,
                'group' => 'simplecrm',
                'key' => 'delete_confirmation_message',
                'text' => '{"en":"The item has been deleted successfully.","id":"Item telah berhasil dihapus."}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            52 =>
            array(
                'id' => 53,
                'group' => 'simplecrm',
                'key' => 'insert_success',
                'text' => '{"en":"The item has been added successfully.","id":"Item telah berhasil ditambahkan."}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            53 =>
            array(
                'id' => 54,
                'group' => 'simplecrm',
                'key' => 'update_success',
                'text' => '{"en":"The item has been modified successfully.","id":"Item telah berhasil diubah."}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            54 =>
            array(
                'id' => 55,
                'group' => 'simplecrm',
                'key' => 'login_successful',
                'text' => '{"en":"Login successful","id":"Berhasil masuk"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            55 =>
            array(
                'id' => 56,
                'group' => 'simplecrm',
                'key' => 'reset_password_successful',
                'text' => '{"en":"Successfully reset password","id":"Berhasil mengatur ulang kata sandi"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            56 =>
            array(
                'id' => 57,
                'group' => 'simplecrm.user',
                'key' => 'title',
                'text' => '{"en":"Users","id":"Pengguna"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            57 =>
            array(
                'id' => 58,
                'group' => 'simplecrm.user',
                'key' => 'title_singular',
                'text' => '{"en":"User","id":"Pengguna"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            58 =>
            array(
                'id' => 59,
                'group' => 'simplecrm.company',
                'key' => 'title',
                'text' => '{"en":"Companies","id":"Perusahaan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            59 =>
            array(
                'id' => 60,
                'group' => 'simplecrm.company',
                'key' => 'title_singular',
                'text' => '{"en":"Company","id":"Perusahaan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            60 =>
            array(
                'id' => 61,
                'group' => 'simplecrm.company.fields',
                'key' => 'id',
                'text' => '{"en":"ID","id":"ID"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            61 =>
            array(
                'id' => 62,
                'group' => 'simplecrm.company.fields',
                'key' => 'name',
                'text' => '{"en":"Name","id":"Nama"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            62 =>
            array(
                'id' => 63,
                'group' => 'simplecrm.company.fields',
                'key' => 'name_input',
                'text' => '{"en":"Enter name","id":"Masukkan nama"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            63 =>
            array(
                'id' => 64,
                'group' => 'simplecrm.company.fields',
                'key' => 'email',
                'text' => '{"en":"Email","id":"Surel"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            64 =>
            array(
                'id' => 65,
                'group' => 'simplecrm.company.fields',
                'key' => 'email_input',
                'text' => '{"en":"Enter email","id":"Masukkan surel"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            65 =>
            array(
                'id' => 66,
                'group' => 'simplecrm.company.fields',
                'key' => 'logo',
                'text' => '{"en":"Logo","id":"Logo"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            66 =>
            array(
                'id' => 67,
                'group' => 'simplecrm.company.fields',
                'key' => 'logo_input',
                'text' => '{"en":"Choose logo file","id":"Pilih file logo"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            67 =>
            array(
                'id' => 68,
                'group' => 'simplecrm.company.fields',
                'key' => 'logo_help_create',
                'text' => '{"en":"Minimum image size is 100x100.","id":"Ukuran gambar minimal 100x100."}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            68 =>
            array(
                'id' => 69,
                'group' => 'simplecrm.company.fields',
                'key' => 'logo_help_edit',
                'text' => '{"en":"Minimum image size is 100x100. Upload image again to replace the current image.","id":"Ukuran gambar minimal 100x100. Unggah gambar lagi untuk menggantikan gambar saat ini."}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            69 =>
            array(
                'id' => 70,
                'group' => 'simplecrm.company.fields',
                'key' => 'website_link',
                'text' => '{"en":"Website Link","id":"Tautan Situs Web"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            70 =>
            array(
                'id' => 71,
                'group' => 'simplecrm.company.fields',
                'key' => 'website_link_input',
                'text' => '{"en":"Enter website link","id":"Masukan tautan situs web"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            71 =>
            array(
                'id' => 72,
                'group' => 'simplecrm.company.fields',
                'key' => 'no_logo',
                'text' => '{"en":"No Logo","id":"Tidak ada Logo"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            72 =>
            array(
                'id' => 73,
                'group' => 'simplecrm.employee',
                'key' => 'title',
                'text' => '{"en":"Employees","id":"Karyawan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            73 =>
            array(
                'id' => 74,
                'group' => 'simplecrm.employee',
                'key' => 'title_singular',
                'text' => '{"en":"Employee","id":"Karyawan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            74 =>
            array(
                'id' => 75,
                'group' => 'simplecrm.employee.fields',
                'key' => 'id',
                'text' => '{"en":"ID","id":"ID"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            75 =>
            array(
                'id' => 76,
                'group' => 'simplecrm.employee.fields',
                'key' => 'full_name',
                'text' => '{"en":"Full Name","id":"Nama Lengkap"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            76 =>
            array(
                'id' => 77,
                'group' => 'simplecrm.employee.fields',
                'key' => 'full_name_input',
                'text' => '{"en":"Enter full name","id":"Masukkan nama lengkap"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            77 =>
            array(
                'id' => 78,
                'group' => 'simplecrm.employee.fields',
                'key' => 'first_name',
                'text' => '{"en":"First Name","id":"Nama Depan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            78 =>
            array(
                'id' => 79,
                'group' => 'simplecrm.employee.fields',
                'key' => 'first_name_input',
                'text' => '{"en":"Enter first name","id":"Masukkan nama depan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            79 =>
            array(
                'id' => 80,
                'group' => 'simplecrm.employee.fields',
                'key' => 'last_name',
                'text' => '{"en":"Last Name","id":"Nama Belakang"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            80 =>
            array(
                'id' => 81,
                'group' => 'simplecrm.employee.fields',
                'key' => 'last_name_input',
                'text' => '{"en":"Enter last name","id":"Masukkan nama belakang"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            81 =>
            array(
                'id' => 82,
                'group' => 'simplecrm.employee.fields',
                'key' => 'company',
                'text' => '{"en":"Company","id":"Perusahan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            82 =>
            array(
                'id' => 83,
                'group' => 'simplecrm.employee.fields',
                'key' => 'company_select',
                'text' => '{"en":"Choose company","id":"Pilih perusahaan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            83 =>
            array(
                'id' => 84,
                'group' => 'simplecrm.employee.fields',
                'key' => 'email',
                'text' => '{"en":"Email","id":"Surel"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            84 =>
            array(
                'id' => 85,
                'group' => 'simplecrm.employee.fields',
                'key' => 'email_input',
                'text' => '{"en":"Enter email","id":"Masukkan surel"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            85 =>
            array(
                'id' => 86,
                'group' => 'simplecrm.employee.fields',
                'key' => 'phone',
                'text' => '{"en":"Phone","id":"Telepon"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            86 =>
            array(
                'id' => 87,
                'group' => 'simplecrm.employee.fields',
                'key' => 'phone_input',
                'text' => '{"en":"Enter phone","id":"Masukkan telepon"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            87 =>
            array(
                'id' => 88,
                'group' => 'simplecrm.employee.fields',
                'key' => 'password',
                'text' => '{"en":"Password","id":"Kata Sandi"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            88 =>
            array(
                'id' => 89,
                'group' => 'simplecrm.employee.fields',
                'key' => 'password_input',
                'text' => '{"en":"Enter password","id":"Masukkan kata sandi"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            89 =>
            array(
                'id' => 90,
                'group' => 'simplecrm.employee.fields',
                'key' => 'password_confirmation',
                'text' => '{"en":"Password Confirmation","id":"Konfirmasi Kata Sandi"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            90 =>
            array(
                'id' => 91,
                'group' => 'simplecrm.employee.fields',
                'key' => 'password_confirmation_input',
                'text' => '{"en":"Enter password confirmation","id":"Masukkan konfirmasi kata sandi"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            91 =>
            array(
                'id' => 92,
                'group' => 'simplecrm.preference',
                'key' => 'title',
                'text' => '{"en":"Preferences","id":"Preferensi"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            92 =>
            array(
                'id' => 93,
                'group' => 'simplecrm.preference',
                'key' => 'choose_language',
                'text' => '{"en":"Choose language","id":"Pilih bahasa"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            93 =>
            array(
                'id' => 94,
                'group' => 'simplecrm.preference',
                'key' => 'choose_timezone',
                'text' => '{"en":"Choose timezone","id":"Pilih zona waktu"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            94 =>
            array(
                'id' => 95,
                'group' => 'simplecrm.preference',
                'key' => 'update_success',
                'text' => '{"en":"Successfully saved changes","id":"Berhasil menyimpan perubahan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            95 =>
            array(
                'id' => 96,
                'group' => 'simplecrm.preference',
                'key' => 'update_error',
                'text' => '{"en":"An error occurred, please try again!","id":"Terjadi kesalahan, silahkan coba lagi!"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            96 =>
            array(
                'id' => 97,
                'group' => 'simplecrm.translation',
                'key' => 'title',
                'text' => '{"en":"Translation","id":"Terjemahan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            97 =>
            array(
                'id' => 98,
                'group' => 'simplecrm.translation.fields',
                'key' => 'id',
                'text' => '{"en":"ID","id":"ID"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            98 =>
            array(
                'id' => 99,
                'group' => 'simplecrm.translation.fields',
                'key' => 'group',
                'text' => '{"en":"Group","id":"Grup"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            99 =>
            array(
                'id' => 100,
                'group' => 'simplecrm.translation.fields',
                'key' => 'key',
                'text' => '{"en":"Key","id":"Kunci"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            100 =>
            array(
                'id' => 101,
                'group' => 'simplecrm.translation.fields',
                'key' => 'text',
                'text' => '{"en":"Text","id":"Teks"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            101 =>
            array(
                'id' => 102,
                'group' => 'simplecrm.translation',
                'key' => 'title_singular',
                'text' => '{"en":"Translation","id":"Terjemahan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            102 =>
            array(
                'id' => 103,
                'group' => 'simplecrm.item',
                'key' => 'title',
                'text' => '{"en":"Items","id":"Item"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            103 =>
            array(
                'id' => 104,
                'group' => 'simplecrm.item',
                'key' => 'title_singular',
                'text' => '{"en":"Item","id":"Item"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            104 =>
            array(
                'id' => 105,
                'group' => 'simplecrm.item.fields',
                'key' => 'id',
                'text' => '{"en":"ID","id":"ID"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            105 =>
            array(
                'id' => 106,
                'group' => 'simplecrm.item.fields',
                'key' => 'name',
                'text' => '{"en":"Name","id":"Nama"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            107 =>
            array(
                'id' => 108,
                'group' => 'simplecrm.item.fields',
                'key' => 'name_input',
                'text' => '{"en":"Enter name","id":"Masukkan nama"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            108 =>
            array(
                'id' => 109,
                'group' => 'simplecrm.item.fields',
                'key' => 'price',
                'text' => '{"en":"Price","id":"Harga"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            110 =>
            array(
                'id' => 111,
                'group' => 'simplecrm.item.fields',
                'key' => 'price_input',
                'text' => '{"en":"Enter price","id":"Masukkan harga"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            111 =>
            array(
                'id' => 112,
                'group' => 'simplecrm.sell',
                'key' => 'title',
                'text' => '{"en":"Sells","id":"Penjualan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            112 =>
            array(
                'id' => 113,
                'group' => 'simplecrm.sell',
                'key' => 'title_singular',
                'text' => '{"en":"Sell","id":"Penjualan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            113 =>
            array(
                'id' => 114,
                'group' => 'simplecrm.sell.fields',
                'key' => 'id',
                'text' => '{"en":"ID","id":"ID"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            115 =>
            array(
                'id' => 116,
                'group' => 'simplecrm.sell.fields',
                'key' => 'created_date',
                'text' => '{"en":"Created Date","id":"Tanggal Dibuat"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            116 =>
            array(
                'id' => 117,
                'group' => 'simplecrm.sell.fields',
                'key' => 'created_date_input',
                'text' => '{"en":"Enter created date","id":"Masukkan tanggal dibuat"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            117 =>
            array(
                'id' => 118,
                'group' => 'simplecrm.sell.fields',
                'key' => 'item_select',
                'text' => '{"en":"Choose item","id":"Pilih item"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            118 =>
            array(
                'id' => 119,
                'group' => 'simplecrm.sell.fields',
                'key' => 'price',
                'text' => '{"en":"Price","id":"Harga"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            119 =>
            array(
                'id' => 120,
                'group' => 'simplecrm.sell.fields',
                'key' => 'price_input',
                'text' => '{"en":"Enter price","id":"Masukkan harga"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            120 =>
            array(
                'id' => 121,
                'group' => 'simplecrm.sell.fields',
                'key' => 'discount',
                'text' => '{"en":"Discount","id":"Diskon"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            121 =>
            array(
                'id' => 122,
                'group' => 'simplecrm.sell.fields',
                'key' => 'discount_input',
                'text' => '{"en":"Enter discount","id":"Masukkan diskon"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            122 =>
            array(
                'id' => 123,
                'group' => 'simplecrm.sell.fields',
                'key' => 'employee_select',
                'text' => '{"en":"Choose employee","id":"Pilih karyawan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            123 =>
            array(
                'id' => 124,
                'group' => 'simplecrm.sell.fields',
                'key' => 'total',
                'text' => '{"en":"Total","id":"Total"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            124 =>
            array(
                'id' => 125,
                'group' => 'simplecrm.sell_summary',
                'key' => 'title',
                'text' => '{"en":"Sell Summaries","id":"Ringkasan Penjualan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            125 =>
            array(
                'id' => 126,
                'group' => 'simplecrm.sell_summary',
                'key' => 'title_singular',
                'text' => '{"en":"Sell Summary","id":"Ringkasan Penjualan"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            126 =>
            array(
                'id' => 127,
                'group' => 'simplecrm.sell_summary.fields',
                'key' => 'id',
                'text' => '{"en":"ID","id":"ID"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            127 =>
            array(
                'id' => 128,
                'group' => 'simplecrm.sell_summary.fields',
                'key' => 'date',
                'text' => '{"en":"Date","id":"Tanggal"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            128 =>
            array(
                'id' => 129,
                'group' => 'simplecrm.sell_summary.fields',
                'key' => 'created_date',
                'text' => '{"en":"Created Date","id":"Tanggal Dibuat"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            129 =>
            array(
                'id' => 130,
                'group' => 'simplecrm.sell_summary.fields',
                'key' => 'last_update',
                'text' => '{"en":"Last Update","id":"Terakhir Diubah"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            130 =>
            array(
                'id' => 131,
                'group' => 'simplecrm.sell_summary.fields',
                'key' => 'price_total',
                'text' => '{"en":"Price Total","id":"Total Harga"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            131 =>
            array(
                'id' => 132,
                'group' => 'simplecrm.sell_summary.fields',
                'key' => 'discount_total',
                'text' => '{"en":"Discount Total","id":"Total Diskon"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
            132 =>
            array(
                'id' => 133,
                'group' => 'simplecrm.sell_summary.fields',
                'key' => 'total',
                'text' => '{"en":"Total","id":"Total"}',
                'created_at' => $now,
                'updated_at' => $now,
            ),
        );

        // Checking if the table already have a query
        if (is_null(DB::table('language_lines')->first()))
            DB::table('language_lines')->insert($language_lines);
        else
            echo "\e[31mTable is not empty, therefore NOT ";
    }
}
