@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Kelola KRS</h2>
    
    <div class="mb-4">
        <a href="{{ route('admin.krs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Tambah KRS
        </a>
    </div>
    
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">Nama Mahasiswa</th>
                <th class="py-2 px-4 border-b">Mata Kuliah</th>
                <th class="py-2 px-4 border-b">SKS</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($krs as $index => $item)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border-b">{{ $krs->mahasiswa->nama }}</td>
                    <td class="py-2 px-4 border-b">{{ $krs->mata_kuliah }}</td>
                    <td class="py-2 px-4 border-b">{{ $krs->sks }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.krs.edit', $krs->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('admin.krs.destroy', $krs->id) }}" method="POST" class="inline">
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
