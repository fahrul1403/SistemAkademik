<?php

namespace App\Http\Controllers;

use App\Models\Khs;
use App\Models\User;
use App\Models\Matkul;
use Illuminate\Http\Request;

class AdminKHSController extends Controller
{
    public function index()
    {
        // Mengambil semua data KHS dan relasi dengan user dan matkul
        $khs = Khs::with('user', 'matkul')->get();
        return view('admin.khs.index', compact('khs'));
    }

    public function create()
    {
        // Mengambil data mahasiswa dan mata kuliah untuk form create
        $mahasiswas = User::where('role', 'mahasiswa')->get();
        $matkuls = Matkul::all();
        return view('admin.khs.create', compact('mahasiswas', 'matkuls'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diinput
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_matkul' => 'required|exists:matkuls,id',
            'semester' => 'required',
            'tahun_akademik' => 'required',
            'nilai_angka' => 'required|numeric',
            'nilai_huruf' => 'required|in:A,B,C,D,E,F',
        ]);

        // Menyimpan data KHS baru
        Khs::create($request->all());
        return redirect()->route('admin.khs.index')->with('success', 'KHS berhasil ditambahkan.');
    }

    public function edit($id)
{
    $kh = Khs::findOrFail($id); // Pastikan $kh diambil dengan benar
    $mahasiswas = User::where('role', 'mahasiswa')->get(); // Ambil data mahasiswa
    $matkuls = Matkul::all(); // Ambil data mata kuliah
    return view('admin.khs.edit', compact('kh', 'mahasiswas', 'matkuls')); // Kirim variabel $kh ke view
}

public function update(Request $request, $id)
{
    // Validasi data yang diinput
    $request->validate([
        'id_user' => 'required|exists:users,id',
        'id_matkul' => 'required|exists:matkuls,id',
        'semester' => 'required',
        'tahun_akademik' => 'required',
        'nilai_angka' => 'required|numeric',
        'nilai_huruf' => 'required|in:A,B,C,D,E,F',
    ]);

    // Ambil data KHS berdasarkan ID
    $kh = Khs::findOrFail($id);

    // Update data KHS
    $kh->update([
        'id_user' => $request->id_user,
        'id_matkul' => $request->id_matkul,
        'semester' => $request->semester,
        'tahun_akademik' => $request->tahun_akademik,
        'nilai_angka' => $request->nilai_angka,
        'nilai_huruf' => $request->nilai_huruf,
    ]);

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('admin.khs.index')->with('success', 'KHS berhasil diupdate.');
}

public function destroy($id)
{
    // Ambil data KHS berdasarkan ID
    $kh = Khs::findOrFail($id);
    
    // Hapus data KHS
    $kh->delete();
    
    return redirect()->route('admin.khs.index')->with('success', 'KHS berhasil dihapus.');
}
}
