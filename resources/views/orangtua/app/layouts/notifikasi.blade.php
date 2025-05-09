@extends('layouts.orangtua')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-center">Daftar Notifikasi</h1>
    <ul class="mt-4">
        @forelse($notifikasis as $notifikasi)
            <li class="bg-blue-100 p-4 rounded-lg shadow-md mt-4">
                <p><strong>{{ $notifikasi->judul }}</strong></p>
                <p>{{ $notifikasi->pesan }}</p>
                <p class="text-gray-500 text-sm">{{ $notifikasi->created_at->format('d M Y, H:i') }}</p>
            </li>
        @empty
            <p class="text-center text-gray-500">Tidak ada notifikasi.</p>
        @endforelse
    </ul>
</div>
@endsection
