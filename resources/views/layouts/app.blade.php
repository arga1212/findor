<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'FineVendor') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('welcome') }}" class="text-xl font-bold text-indigo-600">FineVendor</a>

            <!-- Menu -->
            <div class="space-x-4">
                <!-- Tombol ke Welcome -->
                <a href="{{ route('welcome') }}" class="text-gray-700 hover:text-indigo-600">Beranda</a>

                <!-- Tombol ke Cari Vendor -->
                <a href="{{ route('cari.vendor') }}" class="text-gray-700 hover:text-indigo-600">Cari Vendor</a>

                <!-- Tombol Login/Register -->
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600">Register</a>
            </div>
        </div>
    </nav>

    <main class="py-8">
        @yield('content')
    </main>
</body>
</html>
