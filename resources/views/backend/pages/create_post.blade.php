@extends('backend.include.app')
@section('title', 'Buat Postingan')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Buat Postingan Baru</h1>
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buat Posting Baru</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('upload.post') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul Postingan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Isi Postingan <span class="text-danger">*</span></label>
                        <textarea name="body" id="body" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection