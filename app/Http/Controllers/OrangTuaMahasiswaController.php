<?php

namespace App\Http\Controllers;

use App\Models\OrangTuaMahasiswa;
use App\Models\User;

use Illuminate\Http\Request;

class OrangTuaMahasiswaController extends Controller
{
    public function index()
    {
        // Ambil semua orang tua mahasiswa
        $orangTuaMahasiswa = OrangTuaMahasiswa::with('mahasiswa')->get();

        return view('admin.orangtua.index', compact('orangTuaMahasiswa'));
    }
    public function create()
    {
        // Ambil semua pengguna dengan peran mahasiswa
        $mahasiswa = User::where('role', 'mahasiswa')->get();
        return view('admin.orangtua.create', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:3',
            'mahasiswa_id' => 'required|exists:users,id', // Pastikan mahasiswa_id ada
        ]);

        // Simpan orang tua mahasiswa
        $orangTuaMahasiswa = new OrangTuaMahasiswa();
        $orangTuaMahasiswa->username = $request->username;
        $orangTuaMahasiswa->email = $request->email;
        $orangTuaMahasiswa->password = bcrypt($request->password); // Hash password
        $orangTuaMahasiswa->mahasiswa_id = $request->mahasiswa_id; // Ambil mahasiswa_id dari form
        $orangTuaMahasiswa->save();

        return redirect()->route('admin.orangtua.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $orangTua = OrangTuaMahasiswa::findOrFail($id);
        $mahasiswa = User::where('role', 'mahasiswa')->get(); // Ambil semua mahasiswa

        return view('admin.orangtua.edit', compact('orangTua', 'mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:3',
            'mahasiswa_id' => 'required|exists:users,id', // Pastikan mahasiswa_id ada
        ]);

        $orangTuaMahasiswa = OrangTuaMahasiswa::findOrFail($id);
        $orangTuaMahasiswa->username = $request->username;
        $orangTuaMahasiswa->email = $request->email;

        if ($request->filled('password')) {
            $orangTuaMahasiswa->password = bcrypt($request->password); // Hash password jika diisi
        }

        $orangTuaMahasiswa->mahasiswa_id = $request->mahasiswa_id; // Update mahasiswa_id
        $orangTuaMahasiswa->save();

        return redirect()->route('admin.orangtua.index')->with('success', 'Data berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $orangTua = OrangTuaMahasiswa::findOrFail($id);
        $orangTua->delete();

        return redirect()->route('admin.orangtua.index')->with('success', 'Orang Tua Mahasiswa berhasil dihapus.');
    }


}