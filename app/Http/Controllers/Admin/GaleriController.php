<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
{
    $galeris = Galeri::all();
    return view('admin.galeri.index', compact('galeris'));
}


    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        // Validasi form input
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|max:2048',
            'deskripsi' => 'required',
        ]);

        // Simpan gambar ke storage
        $gambarPath = $request->file('gambar')->store('public/galeri');

        // Buat entri galeri
        $galeri = new Galeri;
        $galeri->judul = $request->judul;
        $galeri->gambar = $gambarPath;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi form input
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $galeri = Galeri::findOrFail($id);
    
        // Periksa apakah ada perubahan gambar
        if ($request->hasFile('gambar')) {
            // Validasi gambar
            $request->validate([
                'gambar' => 'image|max:2048',
            ]);
    
            // Hapus gambar lama
            Storage::delete($galeri->gambar);
    
            // Simpan gambar baru ke storage
            $gambarPath = $request->file('gambar')->store('public/galeri');
            $galeri->gambar = $gambarPath;
        }
    
        // Update data galeri
        $galeri->judul = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();
    
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
    
        // Hapus gambar dari storage
        Storage::delete($galeri->gambar);
    
        // Hapus entri galeri
        $galeri->delete();
    
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}