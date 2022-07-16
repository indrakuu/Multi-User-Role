@extends('backend.include.app')
@section('title', 'Level Akun')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Level Akun</h1>
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
            Data Level Akun
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newPermission"
                title="Membuat Perizinan baru"><i class="fas fa-fw fa-plus" title="Tambah Data"></i></button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if (count($roles) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Level</th>
                        <th>Jenis Perizinan</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @if (count($role->permissions) > 0)
                            <ul>
                                @foreach ($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                                @endforeach
                            </ul>
                            @else
                            <ul>
                                <li><b>Level akun ini memiliki perizinan apapun</b></li>
                            </ul>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-secondary" data-toggle="modal"
                                data-target="#editRole{{ $role->id }}" title="Edit"><i
                                    class="fas fa-fw fa-pencil-alt"></i></></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#deleteRole{{ $role->id }}" title="Hapus"><i
                                    class="fas fa-fw fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <div class="modal fade" id="editRole{{ $role->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Level/Role Akun</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('update.level.account', $role->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Nama Role <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $role->name }}" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="permission">Jenis Perizinan <span class="text-danger">*</span></label>
                                            @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input class="form-check-input" name="permission[]" type="checkbox"
                                                    value="{{  $permission->id }}" id="permission[]"
                                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="permission[]">
                                                    {{  $permission->name }}
                                                </label>
                                            </div>
                                            @endforeach
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
                    <div class="modal fade" id="deleteRole{{ $role->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Level Akun</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah kamu yakin ingin menghapus Level Akun <b>{{ $role->name }}</b>? Data akan
                                        dihapus secara permanen jika menghapusnya</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <form action="{{ route('delete.level.account', $role->id) }}" method="POST">
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
            <p class="text-center">Sistem tidak memiliki Role</p>
            @endif
        </div>
    </div>
</div>
<div class="modal fade" id="newPermission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Membuat Level/Role Akun Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('create.level.account') }}">
                
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Role <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="permission">Jenis Perizinan <span class="text-danger">*</span></label>
                        @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" name="permission[]" type="checkbox"
                                value="{{  $permission->id }}" id="permission[]">
                            <label class="form-check-label" for="permission[]">
                                {{  $permission->name }}
                            </label>
                        </div>
                        @endforeach
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
