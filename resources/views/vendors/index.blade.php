@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10">
    <h1 class="text-3xl font-bold text-center mb-8">Hasil Pencarian Vendor</h1>

    {{-- Form pencarian --}}
    <form action="{{ route('cari.vendor') }}" method="GET" class="mb-8 flex flex-wrap gap-4 justify-center">
        <select name="category_id" class="border rounded px-4 py-2">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <select name="city_id" class="border rounded px-4 py-2">
            <option value="">Semua Kota</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Cari</button>
    </form>

    {{-- Hasil Vendor --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($vendors as $vendor)
            <div class="border rounded-lg shadow p-4 bg-white">
                {{-- Gambar thumbnail --}}
                <img src="{{ asset('storage/' . $vendor->thumbnail) }}" alt="{{ $vendor->name }}"
                    class="h-40 w-full object-cover mb-3 rounded">

                {{-- Nama Vendor --}}
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

                {{-- Harga --}}
                <p class="text-gray-600 text-sm mb-1">{{ $vendor->price_range }}</p>

                {{-- Rating --}}
                @php
                    $avgRating = $vendor->reviews->avg('rating');
                @endphp
                <p class="text-yellow-500 text-sm">⭐ {{ number_format($avgRating ?? 0, 1) }} / 5</p>
            </div>
        @empty
            <p class="text-center col-span-3 text-gray-500">Tidak ditemukan vendor sesuai pencarian.</p>
        @endforelse
    </div>
</div>
@endsection
