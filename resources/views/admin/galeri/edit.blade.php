@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Galeri</h1>
                <br>
                <form method="POST" action="{{ route('admin.galeri.update', $galeri->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $galeri->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <br>
                        <img src="{{ Storage::url($galeri->gambar) }}" alt="{{ $galeri->judul }}" style="max-height: 200px">
                        <br><br>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ $galeri->deskripsi }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
