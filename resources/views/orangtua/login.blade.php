<!-- resources/views/orangtua/login.blade.php -->
@extends('layouts.app')  <!-- Ganti dengan layout yang sesuai jika perlu -->

@section('content')
<div class="max-w-md mx-auto mt-20 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center">Login Orang Tua</h2>

        @if(session('error'))
            <div class="text-red-500 text-sm mt-2">{{ session('error') }}</div>
        @endif

        <form action="{{ url('/orangtua/login') }}" method="POST">
            @csrf
            <div class="mt-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" required>
            </div>
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" required>
            </div>
            <button type="submit" class="mt-6 w-full bg-blue-600 text-white py-2 rounded-lg">Login</button>
        </form>
    </div>
@endsection
