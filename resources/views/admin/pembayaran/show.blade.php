@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Detail Pembayaran</h1>

<div class="mb-4">
    <strong>ID Pembayaran:</strong> {{ $pembayaran->id }}
</div>
<div class="mb-4">
    <strong>User ID:</strong> {{ $pembayaran->user_id }}
</div>
<div class="mb-4">
    <strong>Jumlah:</strong> Rp. {{ number_format($pembayaran->jumlah, 2) }}
</div>
<div class="mb-4">
    <strong>Status:</strong> {{ $pembayaran->status }}
</div>
<div class="mb-4">
    <strong>Bukti Pembayaran:</strong>
    @if($pembayaran->bukti_pembayaran)
        <div class="mt-2">
            <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" target="_blank">
                <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="w-64 h-auto">
            </a>
        </div>
    @else
        <span class="text-gray-500">Belum ada bukti pembayaran</span>
    @endif
</div>

<a href="{{ route('admin.pembayaran.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Kembali</a>
@endsection
