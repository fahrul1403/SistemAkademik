<?php

namespace App\Http\Controllers;

use App\Models\User; // Import model User
use App\Models\KRS; // Import model KRS
use App\Models\KHS; // Import model KHS
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Menghitung jumlah mahasiswa
        $jumlahMahasiswa = User::where('role', 'mahasiswa')->count();

        // Menghitung jumlah orang tua
        $jumlahOrangTua = User::where('role', 'orang_tua')->count();

        // Menghitung jumlah KRS terkonfirmasi
        $jumlahKRS = KRS::count();

        // Mengirim data ke view
        return view('admin.dashboard', [
            'jumlahMahasiswa' => $jumlahMahasiswa,
            'jumlahOrangTua' => $jumlahOrangTua,
            'jumlahKRS' => $jumlahKRS,
        ]);
    }

    public function kelola()
    {
        // Logika untuk menampilkan data mahasiswa/orang tua
        return view('admin.kelola');
    }

    public function kelolaKHS()
    {
        // Mengambil data KHS dari database
        $khslist = KHS::with('users')->get(); // Asumsikan ada relasi 'user' di model KHS
        return view('admin.kelolaKHS', compact('khslist')); // Mengirim data KHS ke view
    }

    public function kelolaKRS()
    {
        // Mengambil data KRS dari database
        $krs = KRS::with('mahasiswa')->get(); // Pastikan relasi 'mahasiswa' ada di model KRS
        return view('admin.kelolaKRS', compact('krs')); // Mengirim data KRS ke view
    }
}
