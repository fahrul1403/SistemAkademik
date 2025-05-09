@extends('layouts.orangtua') <!-- Menggunakan layout yang sesuai -->

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center">Profil Orang Tua</h1>

    <div class="mt-6">
        <h2 class="text-xl font-semibold">Informasi Pribadi</h2>
        <p class="mt-2"><strong>Username:</strong> {{ $orangTua->username }}</p>
        <p class="mt-2"><strong>Email:</strong> {{ $orangTua->email }}</p>
        <p class="mt-2"><strong>Di Buat Pada:</strong> {{ $orangTua->created_at->format('d-m-Y H:i') }}</p>
        <p class="mt-2"><strong>Di Perbarui Pada:</strong> {{ $orangTua->updated_at->format('d-m-Y H:i') }}</p>
    </div>
</div>
@endsection
