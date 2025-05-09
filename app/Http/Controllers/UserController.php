<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $mahasiswa = User::where('role', 'mahasiswa')->get();
        return view('admin.kelolamahasiswa', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = User::findOrFail($id);
        return view('admin.editmahasiswa', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|email|max:100',
        ]);

        $mahasiswa = User::findOrFail($id);
        $mahasiswa->username = $request->username;
        $mahasiswa->email = $request->email;
        $mahasiswa->save();

        return redirect()->route('admin.kelola')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = User::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin.kelola')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}

