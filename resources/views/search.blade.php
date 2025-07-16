@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Hasil Pencarian Vendor</h2>

        <form action="{{ route('search.vendor') }}" method="GET">
            <input type="text" name="search" placeholder="Cari vendor..." value="{{ request('search') }}">
            <select name="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select name="city_id">
                <option value="">-- Pilih Kota --</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Cari</button>
        </form>

        <div class="vendor-list">
            @forelse($vendors as $vendor)
                <div class="vendor-card">
                    <h4>{{ $vendor->name }}</h4>
                    <p>Kategori: {{ $vendor->category->name ?? '-' }}</p>
                    <p>Kota: {{ $vendor->city->name ?? '-' }}</p>
                    <p>Rating: {{ $vendor->reviews->avg('rating') ?? 'Belum ada review' }}</p>
                </div>
            @empty
                <p>Tidak ada vendor ditemukan.</p>
            @endforelse
        </div>
    </div>
@endsection
