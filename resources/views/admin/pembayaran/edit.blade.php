@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Edit Pembayaran</h1>

@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.pembayaran.update', $pembayaran->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
            User ID
        </label>
        <input type="text" id="user_id" name="user_id" value="{{ old('user_id', $pembayaran->user_id) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        @error('user_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah">
            Jumlah
        </label>
        <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $pembayaran->jumlah) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        @error('jumlah')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
            Status
        </label>
        <select id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            <option value="menunggu" {{ $pembayaran->status == 'menunggu' ? 'selected' : '' }}>menunggu</option>
            <option value="lunas" {{ $pembayaran->status == 'lunas' ? 'selected' : '' }}>lunas</option>
           
        </select>
        @error('status')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="bukti_pembayaran">
            Bukti Pembayaran
        </label>
        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <small class="text-gray-500">Biarkan kosong jika tidak ingin mengubah bukti pembayaran.</small>
        @error('bukti_pembayaran')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Simpan
        </button>
        <a href="{{ route('admin.pembayaran.index') }}" class="text-blue-500 hover:underline">Kembali</a>
    </div>
</form>
@endsection
