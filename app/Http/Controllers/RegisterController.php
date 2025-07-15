<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function index()
    {
        return view('user.index.register');
    }

    // Proses registrasi
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'min:5|max:255',
            'username' => 'min:5|max:255|unique:users',
            'email' => 'email:dns|unique:users',
            'password' => 'min:5|max:255|confirmed',
            
            
        ]);
        // Enkripsi password sebelum disimpan ke database
        $data['password'] = Hash::make($data['password']);

        // Simpan data user ke database
        User::create($data);

        // Redirect ke halaman login setelah berhasil registrasi
        return redirect('/login')->with('message', 'Registrasi Berhasil!');
        

    }

    
    

}
