<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matkul; // Import model Matkul
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total mahasiswa
        $totalMahasiswa = User::count();

        // Menghitung total mata kuliah
        $totalMatakuliah = Matkul::count(); // Mengambil total dari tabel matkuls

        // Menghitung total dosen (misal dari tabel dosen, sesuaikan dengan project Anda)
        $totalDosen = 5; // Contoh, ganti dengan query nyata jika Anda punya tabel dosen

        return view('admin.dashboard.index', compact('totalMahasiswa', 'totalMatakuliah', 'totalDosen'));
    }
}
