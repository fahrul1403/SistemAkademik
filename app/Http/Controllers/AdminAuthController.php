<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.adminLogin');
    }

    // Proses autentikasi login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        // Cek kredensial login tanpa hashing
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && $admin->password === $request->password) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard.index');
        }

        // Jika gagal login, kembali ke halaman login dengan pesan error
        return redirect()->back()->with('error', 'Email atau Password salah');
    }
    public function logout(Request $request)
    {
    Auth::guard('admin')->logout();

    // Redirect ke halaman login dengan pesan sukses
    return redirect()->route('admin.login')->with('success', 'Anda telah berhasil logout.');
    }

}
