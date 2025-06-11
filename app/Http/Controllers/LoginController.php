<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('user.index.login');
    }
    public function authenticate(Request $request)
    {
    
       $data = $request->validate([
           'email' => 'required|email:dns',
           'password' => 'required',
       ]);
       if (Auth::attempt($data)) {
           $request->session()->regenerate();
           return redirect()->intended('/post');
       }

    //    dd($data , 'berhasil login');
    return back()->with('loginError', 'Login failed!')->withInput();

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
