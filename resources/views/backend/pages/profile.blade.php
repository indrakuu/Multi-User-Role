@extends('backend.include.app')
@section('title', 'Profile')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Pengaturan Profile</h1>
    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session()->get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <div class="card-body text-center">
                <div>
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;"
                    src="img/undraw_profile.svg" alt="...">
                </div>
                <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Profile</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.profile') }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" id="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Kata Sandi</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('updatePassword.profile') }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="current-password">Password saat ini <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="current-password" name="current-password" required>
                    </div>
                    <div class="form-group">
                        <label for="new-password">Password Baru <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('new-password') is-invalid @enderror" id="new-password" name="new-password" required>
                    </div>
                    <div class="form-group">
                        <label for="new-password">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('new-password') is-invalid @enderror" id="new-password" name="new-password_confirmation" required>
                        @error('new-password')
                            <span class="invalid-feedback" role="alert">
                                <strong>Konfirmasi Password tidak sesuai dengan password baru</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
