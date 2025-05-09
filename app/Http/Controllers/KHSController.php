<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KHS; // Pastikan model KHS sudah ada

class KHSController extends Controller
{
    public function index()
    {
        $khsList = KHS::all(); // Ambil semua data KHS
        return view('admin.kelolaKHS', compact('khsList'));
    }

    public function create()
    {
        return view('admin.createKHS'); // Tampilan untuk menambah KHS
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data KHS
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required|exists:users,id', // Ganti dengan field yang sesuai
            'mata_kuliah' => 'required|string',
            'nilai' => 'required|numeric',
        ]);

        KHS::create($validatedData);
        return redirect()->route('admin.khs.index')->with('success', 'KHS berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $khs = KHS::findOrFail($id);
        return view('admin.editKHS', compact('khs'));
    }

    public function update(Request $request, $id)
    {
        $khs = KHS::findOrFail($id);

        // Validasi dan update data KHS
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required|exists:users,id',
            'mata_kuliah' => 'required|string',
            'nilai' => 'required|numeric',
        ]);

        $khs->update($validatedData);
        return redirect()->route('admin.khs.index')->with('success', 'KHS berhasil diupdate.');
    }

    public function destroy($id)
    {
        $khs = KHS::findOrFail($id);
        $khs->delete();
        return redirect()->route('admin.khs.index')->with('success', 'KHS berhasil dihapus.');
    }
}
