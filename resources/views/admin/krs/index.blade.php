@extends('layouts.admin')

@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Daftar KRS</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded shadow">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.krs.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300 flex items-center">
        <i class="fas fa-plus mr-2"></i> Tambah KRS
    </a>

    <table class="min-w-full mt-4 bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Mahasiswa</th>
                <th class="border px-4 py-2">Mata Kuliah</th>
                <th class="border px-4 py-2">Semester</th>
                <th class="border px-4 py-2">Tahun Akademik</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($krs as $item)
            <tr class="hover:bg-gray-100 transition duration-300">
                <td class="border px-4 py-2">{{ $item->id }}</td>
                <td class="border px-4 py-2">{{ $item->user->username }}</td>
                <td class="border px-4 py-2">{{ $item->matkul->matkul }}</td>
                <td class="border px-4 py-2">{{ $item->semester }}</td>
                <td class="border px-4 py-2">{{ $item->tahun_akademik }}</td>
                <td class="border px-4 py-2 flex space-x-2">
                    <a href="{{ route('admin.krs.edit', $item->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition duration-300 flex items-center">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.krs.destroy', $item->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition duration-300 flex items-center" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
