@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Galeri</h1>
                <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">Tambah Galeri</a>
                <br><br>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galeris as $galeri)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $galeri->judul }}</td>
                                <td>
                                    <img src="{{ Storage::url($galeri->gambar) }}" alt="{{ $galeri->judul }}" style="max-height: 100px">
                                </td>
                                <td>{{ $galeri->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('admin.galeri.edit', ['galeri' => $galeri->id]) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('galeri.destroy', ['galeri' => $galeri->id]) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
