<!-- resources/views/admin/orangtua/edit.blade.php -->
@extends('layouts.admin')

@section('title', 'Edit Orang Tua Mahasiswa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Orang Tua Mahasiswa</h1>
    
    <form action="{{ route('admin.orangtua.update', $orangTua->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="username" class="block text-gray-700">Username</label>
        <input type="text" name="username" id="username" value="{{ $orangTua->username }}" required class="border rounded p-2 w-full">
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" name="email" id="email" value="{{ $orangTua->email }}" required class="border rounded p-2 w-full">
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
        <input type="password" name="password" id="password" class="border rounded p-2 w-full">
    </div>
    <div class="mb-4">
        <label for="mahasiswa_id" class="block text-gray-700">Mahasiswa</label>
        <select name="mahasiswa_id" id="mahasiswa_id" required class="border rounded p-2 w-full">
            <option value="">Pilih Mahasiswa</option>
            @foreach ($mahasiswa as $mhs)
                <option value="{{ $mhs->id }}" {{ $mhs->id == $orangTua->mahasiswa_id ? 'selected' : '' }}>
                    {{ $mhs->username }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
