<?php

namespace App\Http\Controllers;

use App\Models\Papan;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Galeri;
class HomeController extends Controller
{
    public function index()
{
    $galeris = Galeri::all();
    $papans = Papan::latest()->get();
    return view('frontend.homepage', compact('papans', 'galeris'));
}


    public function contact()
    {
        return view('frontend.contact');
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }

    public function contactStore(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required'
        ]);

        Message::create($data);

        return Redirect::back()->with([
            'message' => 'Pesan anda berhasil dikirim',
            'alert-type' => 'success'
        ]);
        
    }
    public function detail(Papan $papan)
    {
        return view('frontend.detail', compact('papan'));
    }
}
