<!-- resources/views/admin/orangtua/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Daftar Orang Tua Mahasiswa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Orang Tua Mahasiswa</h1>
    <a href="{{ route('admin.orangtua.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Orang Tua</a>
    
    @if(session('success'))
        <div class="bg-green-500 text-white p-2 mt-2 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="min-w-full mt-4 bg-white border rounded">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Username</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orangTuaMahasiswa as $orangTua)
                <tr>
                    <td class="border px-4 py-2">{{ $orangTua->id }}</td>
                    <td class="border px-4 py-2">{{ $orangTua->username }}</td>
                    <td class="border px-4 py-2">{{ $orangTua->email }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.orangtua.edit', $orangTua->id) }}" class="text-yellow-500">Edit</a>
                        <form action="{{ route('admin.orangtua.destroy', $orangTua->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
