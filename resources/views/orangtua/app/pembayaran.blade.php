@extends('layouts.orangtua')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center">Pembayaran Mahasiswa</h1>
    <p class="mt-4 text-center">Berikut adalah daftar riwayat pembayaran mahasiswa.</p>

    <!-- Tabel Pembayaran -->
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Tanggal</th>
                    <th class="py-2 px-4 border-b text-center">Jumlah</th>
                    <th class="py-2 px-4 border-b text-center">Status</th>
                    <th class="py-2 px-4 border-b text-center">Bukti</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pembayaranData as $pembayaran)
                    <tr>
                        <td class="py-2 px-4 border-b text-center">{{ $pembayaran->created_at->format('d M Y') }}</td>
                        <td class="py-2 px-4 border-b text-center">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            @if($pembayaran->status === 'Lunas')
                                <span class="text-green-600 font-semibold">{{ $pembayaran->status }}</span>
                            @else
                                <span class="text-yellow-600 font-semibold">{{ $pembayaran->status }}</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b text-center">
                            @if($pembayaran->status === 'Lunas')
                                <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" target="_blank" class="text-blue-500 underline">Lihat Bukti</a>
                            @elseif($pembayaran->status === 'Menunggu')
                                <form action="{{ route('orangtua.pembayaran.uploadBukti', $pembayaran->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex items-center justify-center space-x-2">
                                        <input type="file" name="bukti_pembayaran" class="text-sm border rounded px-2 py-1" required>
                                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                            Upload
                                        </button>
                                    </div>
                                </form>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">Belum ada data pembayaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
