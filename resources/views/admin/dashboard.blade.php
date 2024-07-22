@extends('layouts.admin')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User Management</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Profile</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">User ID</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Role Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_table as $key => $item)
                    <tr>
                        <td class="text-center">
                            <img src="{{ asset('storage/image/avatars/' . $item->avatar) }}" alt="Avatar" class="img-profile rounded-circle" width="50" height="50">
                        </td>
                        <td class="text-center">{{ $item->name }}</td>
                        <td class="text-center">{{ $item->id }}</td>
                        <td class="text-center">{{ $item->nama_lengkap }}</td>
                        <td class="text-center">{{ $item->role_name }}</td>
                        <td class="text-center">{{ $item->email }}</td>
                        <td class="text-center">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    <div class="text-white">{{ $item->status }}</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection
