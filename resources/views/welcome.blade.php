@extends('layouts.app')

@section('content')

{{-- Bagian Sambutan --}}
<section class="text-center py-16 bg-gray-50">
    <h2 class="text-4xl font-bold text-indigo-600 mb-4">Selamat Datang di FineVendor</h2>
    <p class="text-lg text-gray-700 max-w-2xl mx-auto">
        Platform terpercaya untuk menemukan vendor terbaik sesuai kebutuhan Anda.
        Temukan vendor pernikahan, event, atau jasa lainnya dengan mudah dan cepat!
    </p>
</section>

{{-- Bagian Keunggulan --}}
<section class="py-12 bg-white text-center">
    <h3 class="text-2xl font-semibold mb-6">Kenapa Memilih FineVendor?</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
        <div class="p-4 bg-gray-100 rounded-lg shadow">
            <h4 class="text-lg font-semibold mb-2">🔍 Pencarian Mudah</h4>
            <p class="text-gray-600">Cari vendor berdasarkan kategori, lokasi, dan harga sesuai kebutuhan Anda.</p>
        </div>
        <div class="p-4 bg-gray-100 rounded-lg shadow">
            <h4 class="text-lg font-semibold mb-2">✅ Terverifikasi</h4>
            <p class="text-gray-600">Vendor yang tampil telah melewati proses verifikasi oleh tim kami.</p>
        </div>
        <div class="p-4 bg-gray-100 rounded-lg shadow">
            <h4 class="text-lg font-semibold mb-2">⭐ Rating & Review</h4>
            <p class="text-gray-600">Lihat pengalaman pengguna lain sebelum memilih vendor.</p>
        </div>
    </div>
</section>

{{-- Bagian Vendor Favorit --}}
<section id="vendor-favorit" class="py-12 bg-white">
    <h3 class="text-2xl font-semibold text-center mb-6">Vendor Favorit</h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        @if(isset($vendors) && $vendors->count())
        @foreach ($vendors as $vendor)
        <a href="{{ route('vendor.show', $vendor->id) }}" class="block hover:shadow-lg transition hover:scale-[1.02]">
        <div class="border rounded-lg shadow p-4 bg-white">
            <img src="{{ asset('storage/' . $vendor->thumbnail) }}" alt="{{ $vendor->name }}" class="h-40 w-full object-cover mb-3 rounded">
            
            <h4 class="text-xl font-semibold mb-1">{{ $vendor->name }}</h4>

            {{-- Kategori --}}
            <div class="mb-1">
                @foreach ($vendor->categories as $category)
                    <span class="text-sm text-white bg-indigo-500 inline-block px-2 py-1 rounded mr-1">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>

            {{-- Kota --}}
            <div class="mb-2">
                @foreach ($vendor->cities as $city)
                    <span class="text-sm text-white bg-green-500 inline-block px-2 py-1 rounded mr-1">
                        {{ $city->name }}
                    </span>
                @endforeach
            </div>

            {{-- Harga dan Rating --}}
            <p class="text-gray-600 text-sm mb-1">{{ $vendor->price_range }}</p>
            <p class="text-yellow-500 text-sm">⭐ {{ number_format($vendor->reviews->avg('rating') ?? 0, 1) }} / 5</p>
        </div>
    </a>
@endforeach
        @else
            <p class="text-center col-span-3 text-gray-500">Belum ada vendor favorit tersedia.</p>
        @endif
    </div>
</section>

{{-- Bagian Lokasi --}}
<section id="lokasi" class="py-12 bg-gray-50 text-center">
    <h3 class="text-2xl font-semibold mb-6">Lokasi Kantor Kami</h3>
    <p class="text-gray-700 mb-4">Jl. Contoh Alamat No. 123, Surabaya, Jawa Timur</p>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18..."
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>
</section>

@endsection
