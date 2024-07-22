@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Form Tambah Data
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('papans.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_papan">Nama Papan</label>
                    <input type="text" name="nama_papan" class="form-control" value="{{ old('nama_papan') }}">
                </div>
                <div class="form-group">
                    <label for="harga_sewa">Harga Sewa</label>
                    <input type="number" name="harga_sewa" class="form-control" value="{{ old('harga_sewa') }}">
                </div>
                <div class="form-group">
                    <label for="ukuran_papan">Ukuran Papan</label>
                    <input type="text" name="ukuran_papan" class="form-control" value="{{ old('ukuran_papan') }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak tersedia">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_papan">Latar Papan</label>
                    <input type="text" name="latar" class="form-control" value="{{ old('latar') }}">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>


@endsection