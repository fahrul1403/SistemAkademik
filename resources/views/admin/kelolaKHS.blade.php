@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Kelola KHS</h2>
    
    <div class="mb-4">
        <a href="{{ route('admin.khs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Tambah KHS
        </a>
    </div>
    
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">Nama Mahasiswa</th>
                <th class="py-2 px-4 border-b">Mata Kuliah</th>
                <th class="py-2 px-4 border-b">Nilai</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($khslist as $index => $khs)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border-b">{{ $khs->users->nama }}</td> <!-- Pastikan ada field nama di model User -->
                    <td class="py-2 px-4 border-b">{{ $khs->mata_kuliah }}</td>
                    <td class="py-2 px-4 border-b">{{ $khs->nilai }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.khs.edit', $khs->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('admin.khs.destroy', $khs->id) }}" method="POST" class="inline">
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
