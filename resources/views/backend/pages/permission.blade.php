@extends('backend.include.app')
@section('title', 'Perizinan')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Perizinan</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
          Data Perizinan 
        </h6>      
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if (count($permissions) > 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permission->name }}</td>
                        <td> 
                          <p>{{ $permission->description }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="text-center">Kamu tidak memiliki perizinan</p>
            @endif
        </div>
    </div>
</div>
@endsection