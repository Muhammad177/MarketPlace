<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // Jika kamu belum punya middleware 'log', sebaiknya hapus dulu:
        // $this->middleware('log')->only('index');
        // $this->middleware('guest')->except('logout'); // Hapus karena ini untuk halaman login
    }

    // Hanya jika kamu ingin tampilkan daftar semua user


public function show(User $user)
{
    $this->authorize('view', $user);
    return view('user.profile.profile', compact('user'));
}

public function edit(User $user)
{
    $this->authorize('update', $user);
    return view('user.profile.profile', compact('user'));
}

public function update(Request $request, User $user)
{
    $this->authorize('update', $user);

    // Validasi data
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password_lama' => 'required',
    ]);

    // Cek apakah password lama sesuai dengan yang ada di database
    if (!Hash::check($request->password_lama, $user->password)) {
        return back()->withErrors(['password_lama' => 'Password lama tidak sesuai.'])->withInput();
    }

    // Update data
    $user->name = $validated['name'];
    $user->email = $validated['email'];

    // Update password jika diisi
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save(); // Gunakan save(), bukan update()

    return redirect()->route('user.show', $user)->with('success', 'Profil berhasil diperbarui!');
}


}
