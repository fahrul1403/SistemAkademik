<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\User;

class AdminPembayaranController extends Controller
{
    // Menampilkan halaman index pembayaran
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return view('admin.pembayaran.index', compact('pembayarans'));
    }
    public function show($id)
    {
        // Cari pembayaran berdasarkan ID
        $pembayaran = Pembayaran::findOrFail($id);

        // Tampilkan halaman detail pembayaran
        return view('admin.pembayaran.show', compact('pembayaran'));
    }
    // Form tambah pembayaran baru
    public function create()
    {
        $users = User::with('profileMahasiswa')->whereHas('profileMahasiswa')->get();

        return view('admin.pembayaran.create', compact('users'));
    }

    // Menyimpan data pembayaran baru
    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required',
        'jumlah' => 'required|numeric',
        'status' => 'required',
        'bukti_pembayaran' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048', // Validasi file
    ]);

    $data = $request->all();

    // Handle file upload
    if ($request->hasFile('bukti_pembayaran')) {
        $file = $request->file('bukti_pembayaran');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/bukti_pembayaran', $filename, 'public');
        $data['bukti_pembayaran'] = $path; // Simpan path ke database
    }

    Pembayaran::create($data);

    return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan');
}

    // Menampilkan form edit pembayaran
    public function edit($id)
    {
        $pembayaran = Pembayaran::find($id);
        return view('admin.pembayaran.edit', compact('pembayaran'));
    }

    // Mengupdate pembayaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'jumlah' => 'required|numeric',
            'status' => 'required'
        ]);

        $pembayaran = Pembayaran::find($id);
        $pembayaran->update($request->all());
        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil diupdate');
    }

    // Menghapus pembayaran
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();
        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil dihapus');
    }
}
