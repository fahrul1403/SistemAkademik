{{-- resources/views/admin/pembayaran/index.blade.php --}}

@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Daftar Pembayaran</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.pembayaran.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded mb-4 inline-block shadow hover:bg-blue-700 transition">
        <i class="fas fa-plus mr-2"></i> Tambah Pembayaran
    </a>

    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">User ID</th>
                <th class="px-4 py-2 text-left">Jumlah</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Bukti Pembayaran</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayarans as $pembayaran)
                <tr class="border-b hover:bg-gray-100 transition duration-200">
                    <td class="px-4 py-2">{{ $pembayaran->id }}</td>
                    <td class="px-4 py-2">{{ $pembayaran->user_id }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ $pembayaran->status }}</td>
                    <td class="px-4 py-2">
                        @if($pembayaran->bukti_pembayaran)
                            <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" target="_blank" class="text-blue-500 hover:underline">
                                <i class="fas fa-eye mr-1"></i> Lihat Bukti
                            </a>
                        @else
                            <span class="text-gray-500">Belum ada bukti</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.pembayaran.edit', $pembayaran->id) }}" class="text-yellow-500 hover:underline flex items-center">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.pembayaran.destroy', $pembayaran->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline flex items-center">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                        <a href="{{ route('admin.pembayaran.show', $pembayaran->id) }}" class="text-blue-500 hover:underline flex items-center">
                            <i class="fas fa-info-circle mr-1"></i> Detail
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
