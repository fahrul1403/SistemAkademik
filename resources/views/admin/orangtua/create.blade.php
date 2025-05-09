<!-- resources/views/admin/orangtua/create.blade.php -->
@extends('layouts.admin')

@section('title', 'Tambah Orang Tua Mahasiswa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Orang Tua Mahasiswa</h1>
    
    <!-- resources/views/admin/orangtua/create.blade.php -->
<form action="{{ route('admin.orangtua.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="username" class="block text-gray-700">Username</label>
        <input type="text" name="username" id="username" required class="border rounded p-2 w-full">
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" name="email" id="email" required class="border rounded p-2 w-full">
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700">Password</label>
        <input type="password" name="password" id="password" required class="border rounded p-2 w-full">
    </div>
    <div class="mb-4">
        <label for="mahasiswa_id" class="block text-gray-700">Mahasiswa</label>
        <select name="mahasiswa_id" id="mahasiswa_id" required class="border rounded p-2 w-full">
            <option value="">Pilih Mahasiswa</option>
            @foreach ($mahasiswa as $mhs)
                <option value="{{ $mhs->id }}">{{ $mhs->username }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
</form>

@endsection
