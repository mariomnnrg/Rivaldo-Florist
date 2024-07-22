@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="avatar">Avatar:</label>
                            <div class="custom-file">
                                <input type="file" id="avatar" name="avatar" class="custom-file-input">
                                <label class="custom-file-label" for="avatar">Pilih file</label>
                            </div>
                            <div class="text-center m-2">
                            @if ($user->avatar)
                            <div class="avatar-preview">
                                <img src="{{ asset('storage/image/avatars/' . $user->avatar) }}" alt="Avatar Preview" style="height:200px; width:300px;">
                            </div>
                            @else
                            <div class="avatar-preview">
                                <img src="{{ asset('image/default-avatar.png') }}" alt="Default Avatar Preview" style="height:200px; width:300px;">
                            </div>
                            @endif
                        </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
