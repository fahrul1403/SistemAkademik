<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-blue-600 shadow-lg">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="logo text-white text-2xl font-bold">
                Orang Tua
            </div>
            <ul class="nav-links flex space-x-4">
                <li><a href="{{ route('orangtua.dashboard') }}" class="text-white hover:text-blue-300 transition">Dashboard</a></li>
                <li><a href="{{ route('orangtua.khs') }}" class="text-white hover:text-blue-300 transition">KRS</a></li>
                <li><a href="{{ route('orangtua.profile') }}" class="text-white hover:text-blue-300 transition">Profil</a></li>
           </ul>
        </div>
    </nav>
