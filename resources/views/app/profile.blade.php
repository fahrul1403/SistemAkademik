@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Profil Anda</h1>

    {{-- Tampilkan pesan sukses jika ada --}}
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-lg mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Card profil --}}
    <div class="text-center mb-8">
        <h2 class="text-xl font-bold text-gray-800">{{ $user->username }}</h2>
        <p class="text-gray-600">{{ $user->email }}</p>
       
    </div>

    {{-- Form untuk memperbarui profil --}}
    <form action="{{ url('profile') }}" method="POST" class="bg-gray-50 p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ $user->username }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-semibold">Role</label>
            <input type="text" id="role" name="role" value="{{ $user->role }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold">Email</label>
            <input type="text" id="email" name="email" value="{{ $user->email }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300 ease-in-out">Perbarui Profil</button>
    </form>
</div>
@endsection
