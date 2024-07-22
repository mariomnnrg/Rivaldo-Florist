@extends('layouts.admin')

@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if ($user->avatar)
                            <img src="{{ asset('storage/image/avatars/' . $user->avatar) }}" alt="Avatar" class="avatar img-fluid">
                            @else
                            <img src="{{ asset('image/default-avatar.png') }}" alt="Default Avatar" class="avatar img-fluid">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="profile-details">
                                <p><strong>Nama:</strong> {{ $user->name }}</p>
                                <p><strong>Jabatan:</strong> {{ $user->role_name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
