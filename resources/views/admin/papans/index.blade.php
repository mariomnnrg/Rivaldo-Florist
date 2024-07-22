@extends('layouts.admin')

@section('content')

<div class="papan">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Papan Bunga</h3>

        <a href="{{ route('papans.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Papan</th>
                        <th>Gambar Papan</th>
                        <th>Harga Papan</th>
                        <th>Status</th>   
                        <th>Latar</th>      
                        <th>Aksi</th>      
                    </tr>
                </thead>
                <tbody>
                    @forelse($papans as $papan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $papan->nama_papan }}</td>
                        <td><img src="{{ Storage::url($papan->gambar) }}" width="150" alt=""></td>
                        <td>{{ $papan->harga_sewa }}</td>
                        <td>{{ $papan->status }}</td>
                        <td>{{ $papan->latar }}</td>
                        <td>
                            <a href="{{ route('papans.edit', $papan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form class="d-inline" method="post" onclick="return confirm('anda yakain ?')"; action="{{ route('papans.destroy', $papan->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Data Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
