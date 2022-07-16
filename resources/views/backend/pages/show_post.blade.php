@extends('backend.include.app')
@section('title', 'Daftar Postingan')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Daftar Postingan</h1>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Postingan
            <a type="button" class="btn btn-primary" href="{{ route('create.post') }}"
                title="Membuat Perizinan baru"><i class="fas fa-fw fa-plus" title="Tambah Data"></i></a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        @if (count($posts) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showPost{{ $post->id }}" title="Detail"><i
                                    class="fas fa-fw fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editPost{{ $post->id }}" title="Edit"><i
                                    class="fas fa-fw fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePost{{ $post->id }}" title="Hapus"><i
                                    class="fas fa-fw fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <div class="modal fade" id="showPost{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><p>{{ $post->title }}</p></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-justify">
                                <h4 class='text-center'>{{ $post->title }}</h4>
                                <p>{{ $post->body }}</p>
                                <p> <b>Penulis</b> : {{ $post->user->name }}</p>
                                <p>{{ $post->created_at->format('j F Y') }}</p>
                                
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="editPost{{ $post->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Postingan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('edit.post', $post->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="title">Judul Postingan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $post->title }}" id="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="body">Isi Postingan <span class="text-danger">*</span></label>
                                            <textarea name="body" id="body" class="form-control" rows="4" required>{{ $post->body }}</textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deletePost{{ $post->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Postingan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah kamu yakin ingin menghapus postingan <b>{{ $post->title }}</b>? Data akan
                                        dihapus secara permanen jika menghapusnya</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form action="{{ route('delete.post', $post->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            @else
                <p class="text-center">Kamu tidak memiliki Postingan</p>
            @endif
        </div>
    </div>
</div>
@endsection