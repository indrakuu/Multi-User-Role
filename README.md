<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang Project

Setiap sistem yang dibuat secara kompleks akan membutuhkan banyak pengguna dan memiliki hak akses di masing-masing akun sesuai bidangnya. Dengan tujuan untuk mengamankan sistem agar berjalan sesuai prosedur, membagi pekerjaan lebih fokus dan menyederhanakan tampilan sistem yang tidak perlu pada setiap penggunanya.

Project dibangun menggunakan Framework PHP yaitu Laravel dengan versi 9.11

## Mekanisme

Otorisasi yang digunakan dalam membangun role manajemen yaitu berupa Policy dan Permission yang sudah disediakan oleh Framework Laravel sehingga dapat menghasilkan hak akses (Role) kepada setiap User yang berbeda.

## Penggunaan Dasar

Project ini tidak hanya sekedar Multi User dan Role tetapi terdapat impelementasi CRUD (Create, Read, Update, Delete). Sebagai permulaan sistem sudah menyediakan data dummy sehingga penggunaannya dapat digunakan secara langsung berdasarkan pembagian data.


## Pastikan sudah menyiapkan ketentuan dibawah ini sebelum pemasangan
1. Composer versi 2 / terbaru
2. PHP versi 8 keatas
3. Laravel 9 keatas
4. XAMPP terbaru (bisa menggunakan aplikasi sejenisnya)

# Cara Pemasangan Project
1. Clone Repository atau Download ZIP
2. Ekstrak ZIP jika menggunakan Download ZIP
3. Buka terminal atau CMD dan arahkan ke dalam direktori project
4. Ketik 'composer install' (di teriminal atau CMD)
5. Lalu ketik 'cp .env.example .env' (di teriminal atau CMD)
6. Ketik kembali 'php artisan key:generate'
7. Buat database kosong di MySQL yaitu 'multiuser'
8. Pastikan modul Apache dan MySQL sudah aktif agar data bisa dimasukkan.
9. Sesuaikan nama DB_HOST, DB_PORT, DB_DATABASE (jika tidak menggunakan 'multiuser'), DB_USERNAME, and DB_PASSWORD di file .env
10. Migrasikan tabel beserta seeder ke dalam database MySQL dengan mengetik 'php artisan migrate:fresh --seed'.
11. Jalankan project dengan mengetik 'php artisan serve'.
12. Buka alamat localhost yang muncul di broswer kesayangan.

# Demo
Cooming Soon

# Terimakasih

