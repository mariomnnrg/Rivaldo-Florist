<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
{
    $user = Auth::user();
    return view('admin.profile.index', compact('user'));
}

public function edit()
{
    $user = Auth::user();
    return view('admin.profile.edit', compact('user'));
}

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Ambil user yang akan diupdate
        $user = User::find(Auth::id());

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;

        // Cek apakah ada file avatar yang diupload
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar) {
                Storage::delete('public/image/avatars/' . $user->avatar);
            }

            // Upload file avatar baru
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $avatar->getClientOriginalName();
            $avatar->storeAs('public/image/avatars', $avatarName);
            $user->avatar = $avatarName;
        }

        // Simpan perubahan pada user
        $user->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('admin.profile.index')->with('success', 'Profile berhasil diperbarui.');
    }
}
