<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'method' => 'required|in:hash,plain', // Menentukan metode login
        ]);

        $user = User::where('email', $request->email)->first();

        // Cek berdasarkan metode yang dipilih
        if ($request->method === 'hash') {
            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->to('app/index'); // Ganti dengan rute yang sesuai
            }
        } elseif ($request->method === 'plain') {
            if ($user && $user->password === $request->password) { // Tanpa hashing
                Auth::login($user);
                return redirect()->to('app/index'); // Ganti dengan rute yang sesuai
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Ganti dengan rute yang sesuai
    }
}
