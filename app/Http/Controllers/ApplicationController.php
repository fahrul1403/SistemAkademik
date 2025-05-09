<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Krs;
use App\Models\Khs;
use App\Models\User;
use App\Models\Matkul;

class ApplicationController extends Controller
{
    // Menampilkan halaman utama
    public function index()
    {
        $khsData = Khs::with('matkul')->where('id_user', Auth::id())->get();
        return view('app.index', compact('khsData')); // Mengirim data KHS ke view
    }

    // Menampilkan profil pengguna
    public function showProfile()
    {
        $user = Auth::user();
        return view('app.profile', ['user' => $user]);
    }

    // Menampilkan semua pengguna
    public function showUsers()
    {
        $users = User::all();
        return view('app.users', ['users' => $users]);
    }

    // Mengupdate profil pengguna
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->update($request->only(['name', 'nim', 'jurusan']));

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    // Menampilkan data KRS
    public function showKRS()
    {
        $krsData = Krs::with('matkul')->where('id_user', Auth::id())->get();
        $matkuls = Matkul::all(); // Ambil semua mata kuliah
        return view('app.krs', compact('krsData', 'matkuls'));
    }

    // Menyimpan KRS
    public function submitKRS(Request $request)
    {
        $request->validate([
            'id_matkul' => 'required|exists:matkuls,id',
            'semester' => 'required|string|max:10',
            'tahun_akademik' => 'required|string|max:9',
        ]);

        Krs::create([
            'id_user' => Auth::id(),
            'id_matkul' => $request->id_matkul,
            'semester' => $request->semester,
            'tahun_akademik' => $request->tahun_akademik,
        ]);

        return redirect()->route('krs')->with('success', 'KRS berhasil ditambahkan.');
    }

    // Menampilkan form edit KRS
    public function editKRS($id)
    {
        $krs = Krs::findOrFail($id);
        $matkuls = Matkul::all();
        return view('app.edit_krs', compact('krs', 'matkuls'));
    }

    // Mengupdate data KRS
    public function updateKRS(Request $request, $id)
    {
        $request->validate([
            'id_matkul' => 'required|exists:matkuls,id',
            'semester' => 'required|string|max:10',
            'tahun_akademik' => 'required|string|max:9',
        ]);

        $krs = Krs::findOrFail($id);
        $krs->update([
            'id_matkul' => $request->id_matkul,
            'semester' => $request->semester,
            'tahun_akademik' => $request->tahun_akademik,
        ]);

        return redirect()->route('krs')->with('success', 'KRS berhasil diperbarui.');
    }

    // Menghapus KRS
    public function destroyKRS($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();

        return redirect()->route('krs')->with('success', 'KRS berhasil dihapus.');
    }

    // Menampilkan data KHS
    public function showKHS()
    {
        $khsData = Khs::with('matkul')->where('id_user', Auth::id())->get();
        $matkuls = Matkul::all(); // Ambil semua mata kuliah
        return view('app.khs', compact('khsData', 'matkuls'));
    }

    // Mengupdate atau menyimpan KHS
    public function submitKHS(Request $request)
    {
        $request->validate([
            'semester' => 'required|string',
            'nilai_angka' => 'required|numeric',
            'id_matkul' => 'required|exists:matkuls,id',
            'tahun_akademik' => 'required|string',
        ]);

        Khs::updateOrCreate(
            ['id' => $request->khs_id], // Pastikan ini ada jika ingin update
            [
                'semester' => $request->semester,
                'nilai_angka' => $request->nilai_angka,
                'id_matkul' => $request->id_matkul,
                'id_user' => Auth::id(),
                'tahun_akademik' => $request->tahun_akademik,
            ]
        );

        return redirect()->back()->with('success', 'Data KHS berhasil disimpan!');
    }

    // Menghapus KHS
    public function destroyKHS($id)
    {
        $khs = Khs::findOrFail($id);
        $khs->delete();

        return redirect()->route('khs')->with('success', 'KHS berhasil dihapus.');
    }
}
