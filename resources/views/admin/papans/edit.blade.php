@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="cold-lg-8">
        <div class="card">
            <div class="card-header">
                Form Edit Data
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('papans.update', $papan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_papan">Nama Papan</label>
                        <input type="text" name="nama_papan" class="form-control" value="{{ old('nama_papan', $papan->nama_papan) }}">
                    </div>
                    <div class="form-group">
                        <label for="harga_sewa">Harga Sewa</label>
                        <input type="number" name="harga_sewa" class="form-control" value="{{ old('harga_sewa', $papan->harga_papan) }}">
                    </div>
                    <div class="form-group">
                        <label for="ukuran_papan">Ukuran Papan</label>
                        <input type="text" name="ukuran_papan" class="form-control" value="{{ old('ukuran_papan', $papan->ukuran_papan) }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10">{{ old('deskripsi', $papan->deskripsi) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option {{$papan->status == 'tersedia'? 'selected' : null }}  value="tersedia">Tersedia</option>
                            <option {{$papan->status == 'tidak tersedia'? 'selected' : null }}  value="tidak tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ukuran_papan">Latar Papan</label>
                        <input type="text" name="latar" class="form-control" value="{{ old('latar', $papan->latar) }}">
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
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Form Edit Gambar
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.papans.updateImage',$papan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <img src="{{ Storage::url($papan->gambar) }}" width="150" alt="">
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
    </div>
</div>


@endsection