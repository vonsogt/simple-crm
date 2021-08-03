<p align="center">
  <h1 align="center">Simple CRM</h1>
  
  <p align="center">
    <a href="http://simple-crm.vonso.online/">Lihat Demo</a>
    ·
    <a href="https://github.com/vonsogt/simple-crm/issues">Laporkan Kesalahan</a>
    ·
    <a href="https://github.com/vonsogt/simple-crm/issues">Ajukan Fitur Baru</a>
  </p>
</p>

## Daftar Isi

* [Tentang Simple CRM](#tentang-simple-crm)
  * [Dibuat Menggunakan](#dibuat-menggunakan)
* [Gambar](#gambar)
* [Fitur](#fitur)
* [Mulai](#mulai)
  * [Prasyarat](#prasyarat)
  * [Instalasi](#instalasi)
* [Petunjuk](#petunjuk)
* [Lisensi](#lisensi)
* [Kontak](#kontak)

## Tentang simple-crm

Simple CRM merupakan aplikasi yang dapat mencatat data perusahaan dan karyawannya dengan tampilan dan menu yang mudah dipahami.

### Dibuat Menggunakan
* [Laravel](https://laravel.com/)

## Gambar

![Asset 1](https://user-images.githubusercontent.com/35516476/124917574-30f5fc00-e01e-11eb-84bf-bf53390bfdec.png)

## Fitur
- Ability to SignIn
- Using AdminLTE 3.1.0
- Using DataTable for list table
- Simple CRUD for "Companies" and "Employees"
- Able to upload file/media
- Support multi language
- Email notification in every company registered

## Mulai

Sebelum melakukan instalasi projek `simple-crm` ada baiknya perhatikan hal-hal berikut ini:

### Prasyarat

Sebelum menggunakan projek ini, diperlukanya [composer](https://getcomposer.org/):
* composer
  ```sh
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
  php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
  php composer-setup.php
  php -r "unlink('composer-setup.php');"
  ```

### Instalasi

1. Pastikan atau unduh terlebih dahulu [Git](https://git-scm.com/downloads)
2. `Clone` [proyek ini](https://github.com/vonsogt/simple-crm)
   ```sh
   git clone https://github.com/vonsogt/simple-crm.git
   ```
3. Pindah ke direktori 
   ```sh
   cd simple-crm
   ```
4. Instal Package Composer
   ```sh
   composer install
   ```
5. Copy file `.env.example` menjadi `.env`
   ```sh
   cp .env.example .env
   ```
6. Jalankan `migrasi` dan `seeder`
   ```sh
   php artisan migrate --seed
   ```
7. Jalankan aplikasi
   ```sh
   php artisan serve
   ```
8. Enjoy!

## Petunjuk

Lihat [open issues](https://github.com/vreedom-base/perpuskita/issues) untuk daftar fitur yang diusulkan (dan masalah yang diketahui).

## Lisensi

`simple-crm` berlisensi di bawah [MIT license](https://opensource.org/licenses/MIT).

## Kontak

Vonso - admin@vonso.online
