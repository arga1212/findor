<nav class="bg-white shadow p-4 flex justify-between items-center">
    <a href="{{ route('welcome') }}" class="text-2xl font-bold text-indigo-600">FineVendor</a>
    
    <div class="space-x-4">
        <a href="{{ route('cari.vendor') }}" class="text-gray-700 hover:text-indigo-600">Cari Vendor</a>
        
        @auth
            <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">Login</a>
            <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600">Register</a>
        @endauth
    </div>
</nav>
