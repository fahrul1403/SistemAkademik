@extends('layouts.admin') {{-- Ganti dengan layout Anda --}}

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Daftar Mahasiswa</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.mahasiswa.create') }}" class="inline-block mb-4 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-150">Tambah Mahasiswa</a>

    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left text-sm font-medium text-gray-600">Username</th>
                <th class="py-2 px-4 text-left text-sm font-medium text-gray-600">Email</th>
                <th class="py-2 px-4 text-left text-sm font-medium text-gray-600">Role</th>
                <th class="py-2 px-4 text-left text-sm font-medium text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td class="py-2 px-4">{{ $mahasiswa->username }}</td>
                    <td class="py-2 px-4">{{ $mahasiswa->email }}</td>
                    <td class="py-2 px-4">{{ ucfirst($mahasiswa->role) }}</td>
                    <td class="py-2 px-4 flex space-x-2">
                        <a href="{{ route('admin.mahasiswa.edit', $mahasiswa->id) }}" class="text-yellow-500 hover:underline"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.mahasiswa.destroy', $mahasiswa->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-4"><i class="fas fa-trash-alt"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
