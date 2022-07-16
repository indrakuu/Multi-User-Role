@extends('backend.include.app')
@section('title', 'Daftar Pengguna')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Akun Pengguna</h1>
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
          Data Akun Pengguna
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newUser"
          title="Membuat Akun baru"><i class="fas fa-fw fa-plus" title="Tambah Data"></i></button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        @if (count($users) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detailAccount{{ $user->id }}" title="Edit"><i
                                    class="fas fa-fw fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccount{{ $user->id }}" title="Hapus"><i
                                    class="fas fa-fw fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <div class="modal fade" id="detailAccount{{ $user->id }}" tabindex="-1"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit User Akun</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form method="POST" action="{{ route('update.accounts', $user->id) }}">
                                  @method('PUT')
                                  @csrf
                                  <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Nama User <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="role_id">Level Akun <span class="text-danger">*</span></label>
                                      <select class="form-control" name="role_id" id="role_id" required>
                                        <option value="">-- Pilih Level --</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                      </select>
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
                  <div class="modal fade" id="deleteAccount{{ $user->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah kamu yakin ingin menghapus Akun dari <b>{{ $user->name }}</b>? Data akan
                                    dihapus secara permanen jika menghapusnya</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <form action="{{ route('delete.accounts', $user->id) }}" method="POST">
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
            <p class="text-center">Sistem tidak memiliki User</p>
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Membuat User Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('create.accounts') }}">    
          @csrf
          <div class="modal-body">
              <div class="form-group">
                  <label for="name">Nama User <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="name" id="name" required>
              </div>
              <div class="form-group">
                  <label for="email">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="email" id="email" required>
              </div>
              <div class="form-group">
                  <label for="password">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="password" id="password" required>
              </div>
              <div class="form-group">
                <label for="role_id">Level Akun <span class="text-danger">*</span></label>
                <select class="form-control" name="role_id" id="role_id" required>
                  <option value="">-- Pilih Level --</option>
                  @foreach ($roles as $role)
                  <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select> 
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
      </div>
    </div>
  </div>
@endsection
