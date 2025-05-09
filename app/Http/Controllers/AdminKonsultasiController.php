<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi; // Model Konsultasi

class AdminKonsultasiController extends Controller
{
    // Menampilkan semua konsultasi
    public function index()
    {
        $konsultasi = Konsultasi::with('user')->get(); // Mengambil data konsultasi
        return view('admin.konsultasi.index', compact('konsultasi'));
    }

    // Menghapus konsultasi
    public function destroy($id)
    {
        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->delete(); // Hapus konsultasi

        return redirect()->route('admin.konsultasi.index')->with('success', 'Konsultasi telah dihapus.');
    }
}
