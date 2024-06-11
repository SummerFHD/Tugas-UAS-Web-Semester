<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function loginStore(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek apakah user terdaftar di database
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // Cek apakah password benar
            if (password_verify($request->password, $user->password)) {
                auth()->login($user);
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('fail', 'Password anda salah');
            }
        } else {
            return redirect()->back()->with('fail', 'Email tidak terdaftar');
        }
    }

    public function register() {
        return view('auth.register');
    }

    public function registerStore(Request $request) {
        // validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        // Menyimpan data user ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) // enkripsi password dengan bcrypt
        ]);

        // Redirect ke halaman login
        return redirect()->route('login')->with('success', 'Register berhasil, silahkan login');
    }
}
