<?php
namespace App\Http\Controllers;

use App\Models\OrangTuaMahasiswa; // Impor model OrangTuaMahasiswa
use App\Models\KHS;
use App\Models\KRS;
use Illuminate\Http\Request;
use App\Models\Notifikasi;
use App\Models\ProfileMahasiswa;
use Illuminate\Support\Facades\Hash;

class OrangTuaController extends Controller
{
    public function showLoginForm()
    {
        return view('orangtua.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string', // Validasi username
            'password' => 'required|string', // Validasi password
        ]);

        // Ambil orang tua mahasiswa berdasarkan username
        $orangTua = OrangTuaMahasiswa::where('username', $request->username)->first();

        // Cek apakah orang tua ada dan password cocok
        if ($orangTua && Hash::check($request->password, $orangTua->password)) {
            // Simpan hanya ID pengguna di session
            session(['user_id' => $orangTua->id]); // Hanya simpan ID

            return view('orangtua.app.dashboard'); // Ganti 'dashboard' dengan rute yang sesuai
        }

        // Jika login gagal
        return redirect()->back()->with('error', 'Username atau Password salah.');
    }

    public function logout()
    {
        // Hapus session orang tua
        session()->forget('user_id'); // Hapus hanya user_id dari session
        return redirect()->route('orangtua.login')->with('success', 'Anda telah logout.');
    }

    public function showRegistrationForm()
    {
        return view('orangtua.register');
    }


    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|unique:orang_tua_mahasiswa,username|max:255',
            'email' => 'required|string|email|max:255|unique:orang_tua_mahasiswa,email',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $orangTua = new OrangTuaMahasiswa();
        $orangTua->username = $validatedData['username']; // Simpan username
        $orangTua->email = $validatedData['email'];
        $orangTua->password = bcrypt($validatedData['password']);
        $orangTua->save();

        return redirect()->route('orangtua.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function khs()
    {
        $userId = session('user_id'); // Ambil user_id dari session
        $mahasiswaId = OrangTuaMahasiswa::where('id', $userId)->value('mahasiswa_id');
        $khsData = Khs::where('id_user', $mahasiswaId)->get(); // Ambil data KHS dari database

        return view('orangtua.app.khs', ['khsData' => $khsData]);
    }

    // Metode untuk menampilkan KRS
    public function krs()
    {
        $userId = session('user_id'); // Ambil user_id dari session
        $mahasiswaId = OrangTuaMahasiswa::where('id', $userId)->value('mahasiswa_id');
        $krsData = Krs::where('id_user', $mahasiswaId)->get(); // Ambil data KRS dari database

        return view('orangtua.app.krs', ['krsData' => $krsData]);
    }

    public function profil()
    {
        $userId = session('user_id');
        $mahasiswaId = OrangTuaMahasiswa::where('id', $userId)->value('mahasiswa_id');
        $profil = ProfileMahasiswa::where('user_id', $mahasiswaId)->first();

        return view('orangtua.app.profil', compact('profil'));
    }

    // Metode untuk menampilkan profil
    public function profile()
    {
        // Ambil data orang tua berdasarkan ID pengguna yang sedang login
        $orangTua = auth()->user();

        if (!$orangTua) {
            return redirect()->route('orangtua.login')->with('error', 'Anda harus login untuk mengakses profil ini.');
        }

        return view('orangtua.app.profile', ['orangTua' => $orangTua]);
    }
    public function showDashboard()
    {
        // Contoh notifikasi yang ditambahkan ke session
        session()->flash('notification', 'Ada pembaruan pada nilai KHS mahasiswa Anda!');
        return view('dashboard.orangtua');
    }


    public function notif()
    {
        // Mengambil semua notifikasi dari database, urutkan dari terbaru ke terlama
        $notifikasis = Notifikasi::orderBy('created_at', 'desc')->get();

        // Menampilkan view 'orangtua.notifikasi' dengan data notifikasi
        return view('orangtua.notifikasi');
    }

}