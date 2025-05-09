<?php

namespace App\Http\Controllers;

use App\Models\User; // Model User yang sesuai
use Illuminate\Http\Request;

class KelolaMahasiswaController extends Controller
{
    // Menampilkan daftar mahasiswa
    public function index()
    {
        $mahasiswas = User::all(); // Mengambil semua data mahasiswa
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    // Menampilkan form untuk menambahkan mahasiswa baru
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    // Menyimpan mahasiswa baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users', // Unik di tabel users
            'password' => 'required|string|min:8|confirmed', // Password harus dikonfirmasi
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Enkripsi password
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit mahasiswa
    public function edit($id)
    {
        $mahasiswa = User::findOrFail($id);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    // Memperbarui mahasiswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users,email,' . $id, // Mengabaikan email mahasiswa yang sedang diedit
            'password' => 'nullable|string|min:8|confirmed', // Password opsional
        ]);

        $mahasiswa = User::findOrFail($id);
        $mahasiswa->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $mahasiswa->password, // Update password jika diisi
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    // Menghapus mahasiswa
    public function destroy($id)
    {
        $mahasiswa = User::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
