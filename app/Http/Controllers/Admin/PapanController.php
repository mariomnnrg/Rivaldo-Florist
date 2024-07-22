<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\Papan;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PapanStoreRequest;
use App\Http\Requests\Admin\PapanUpdateRequest;
use Illuminate\Support\Facades\Storage;


class PapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  \Illuminate\Http\Response
     */
    public function index()
    {
        $papans= Papan::latest()->get();
        return view('admin.papans.index', compact('papans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.papans.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(PapanStoreRequest $request)
{
    if ($request->validated()) {
        $gambar = $request->file('gambar')->store('assets/papan', 'public');
        $slug = Str::slug($request->nama_papan, '-');
        Papan::create($request->except('gambar') + ['gambar' => $gambar, 'slug' => $slug]);
    }

    return redirect()->route('papans.index')->with([
        'message' => 'Data berhasil diedit.',
        'alert-type' => 'info'
    ]);
}


    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
{
    $papan = Papan::findOrFail($id);
    return view('admin.papans.edit', compact('papan'));
}


    /**
     * Update the specified resource in storage.
     *
     */
    public function update(PapanUpdateRequest $request, $id)
    {
        $papan = Papan::findOrFail($id);

        if ($request->validated()) {
            $slug = Str::slug($request->nama_papan, '-');
            $papan->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('papans.index')->with([
            'message' => 'Data berhasil diedit.',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Papan $papan)
    {
        if($papan->gambar){
            unlink('storage/'. $papan->gambar);
        }
        $papan->delete();

        return redirect()->back()->with([
            'message' => 'data berhasil di hapus',
            'alert-type' => 'danger'
        ]);
    }

    public function updateImage(Request $request, $papanId)
    {
        $request->validate([
            'gambar' => 'required|image'
        ]);

        $papan = Papan::findOrFail($papanId);
        if($request->hasFile('gambar')){
            $oldImage = $papan->gambar;
            if($oldImage){
                Storage::disk('public')->delete($oldImage);
            }
            $gambar = $request->file('gambar')->store('assets/papan', 'public');
            $papan->gambar = $gambar;
            $papan->save();
        }

        return redirect()->back()->with([
            'message' => 'Gambar berhasil diubah',
            'alert-type' => 'info'
        ]);
    }


}
