@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Pembayaran</h1>

<form action="{{ route('admin.pembayaran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="user_id" class="block text-gray-700">Mahasiswa</label>
        <select name="user_id" id="user_id" class="w-full px-4 py-2 border rounded" required>
            <option value="">-- Pilih Mahasiswa --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->profileMahasiswa->nama_lengkap ?? $user->username }} ({{ $user->email }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="jumlah" class="block text-gray-700">Jumlah</label>
        <input type="number" step="0.01" name="jumlah" id="jumlah" class="w-full px-4 py-2 border rounded" required>
    </div>
    <div class="mb-4">
        <label for="status" class="block text-gray-700">Status</label>
        <select name="status" id="status" class="w-full px-4 py-2 border rounded">
            <option value="Menunggu">Menunggu</option>
            <option value="Lunas">Lunas</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="bukti_pembayaran" class="block text-gray-700">Bukti Pembayaran</label>
        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="w-full px-4 py-2 border rounded">
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
