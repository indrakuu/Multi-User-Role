@extends('frontend.include.app')
@section('content')
<!-- Header-->
<header class="bg-dark bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Multi User Role - DuniaDev</h1>
        <p class="lead">Bangun Role manajemen untuk membagi dan membatasi aturan di setiap User</p>
        <a class="btn btn-lg btn-light" href="{{ route('login') }}">Login Sekarang!!</a>
    </div>
</header>
<!-- About section-->
<section id="about">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>Tentang</h2>
                <p class="lead">Setiap sistem yang dibuat secara kompleks akan membutuhkan banyak pengguna dan memiliki hak akses di masing-masing akun sesuai bidangnya. Dengan tujuan untuk mengamankan sistem agar berjalan sesuai prosedur, membagi pekerjaan lebih fokus dan menyederhanakan tampilan sistem yang tidak perlu pada setiap penggunanya.</p>
                <p class="lead">Project dibangun menggunakan Framework PHP yaitu Laravel dengan versi 9.11</p>
            </div>
        </div>
    </div>
</section>
<!-- Services section-->
<section class="bg-light" id="services">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>Mekanisme</h2>
                <p class="lead">Otorisasi yang digunakan dalam membangun role manajemen yaitu berupa Policy dan Permission yang sudah disediakan oleh Framework Laravel sehingga dapat menghasilkan hak akses (Role) kepada setiap User yang berbeda.</p>
            </div>
        </div>
    </div>
</section>
<!-- Contact section-->
<section id="contact">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>Penggunaan Dasar</h2>
                <p class="lead">Project ini tidak hanya sekedar Multi User dan Role tetapi terdapat impelementasi CRUD (Create, Read, Update, Delete). Sebagai permulaan sistem sudah menyediakan data dummy sehingga penggunaannya dapat digunakan secara langsung berdasarkan pembagian data.</p>
            </div>
        </div>
    </div>
</section>
@endsection