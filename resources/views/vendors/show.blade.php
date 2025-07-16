@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <img src="{{ asset('storage/' . $vendor->thumbnail) }}" class="w-full h-64 object-cover rounded mb-6">
    <h2 class="text-3xl font-bold mb-2">{{ $vendor->name }}</h2>
    <p class="text-gray-700 mb-4">{{ $vendor->description }}</p>

    <div class="mb-4">
        <strong>Kategori:</strong>
        @foreach($vendor->categories as $cat)
            <span class="bg-indigo-600 text-white text-sm px-2 py-1 rounded mr-2">{{ $cat->name }}</span>
        @endforeach
    </div>

    <div class="mb-4">
        <strong>Kota:</strong>
        @foreach($vendor->cities as $city)
            <span class="bg-green-600 text-white text-sm px-2 py-1 rounded mr-2">{{ $city->name }}</span>
        @endforeach
    </div>

    <div class="mb-4">
        <strong>Property:</strong>
        @foreach($vendor->properties as $prop)
            <div class="inline-block text-center mr-4 mb-2">
                @if($prop->image)
                    <img src="{{ asset('storage/' . $prop->image) }}" class="h-12 w-12 object-cover rounded-full mx-auto mb-1">
                @endif
                <span class="text-sm">{{ $prop->name }}</span>
            </div>
        @endforeach
    </div>

    <div class="mb-4">
        <strong>⭐ Rating:</strong>
        @php $avgRating = $vendor->reviews->avg('rating'); @endphp
        {{ number_format($avgRating ?? 0, 1) }} / 5
    </div>

    {{-- ✅ DAFTAR PAKET --}}
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-2">Daftar Paket:</h3>
        <div class="grid md:grid-cols-2 gap-4">
            @forelse($vendor->packages as $package)
                <div class="border rounded p-4">
                    @if($package->image)
                        <img src="{{ asset('storage/' . $package->image) }}" class="w-full h-48 object-cover rounded mb-2">
                    @endif
                    <div class="font-bold text-lg">{{ $package->name }}</div>
                    <div class="text-sm text-gray-700 mb-2">{{ $package->description }}</div>
                    <div class="text-sm mb-1"><strong>Harga:</strong> Rp {{ number_format($package->price, 0, ',', '.') }}</div>
                    
                    @if($package->properties->count())
                        <div class="text-sm">
                            <strong>Properti di paket:</strong>
                            <ul class="list-disc pl-5">
                                @foreach($package->properties as $prop)
                                    <li>{{ $prop->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @empty
                <p>Tidak ada paket tersedia.</p>
            @endforelse
        </div>
    </div>

    {{-- ✅ RIWAYAT EVENT --}}
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-2">Riwayat Event:</h3>
        <div class="grid md:grid-cols-2 gap-4">
            @forelse($vendor->events as $event)
                <div class="border p-4 rounded">
                    <h4 class="font-bold text-lg mb-1">{{ $event->name }}</h4>
                    <p class="text-sm text-gray-600 mb-2">
                        📅 {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                    </p>
                    <p class="text-sm text-gray-700 mb-2">{{ $event->description }}</p>
                    @if($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" class="w-full h-48 object-cover rounded">
                    @endif
                </div>
            @empty
                <p>Tidak ada riwayat event.</p>
            @endforelse
        </div>
    </div>

    {{-- ✅ LINK SOSIAL --}}
    <div class="fixed bottom-5 left-5 flex gap-3">
        @if($vendor->whatsapp_number)
            <a href="https://wa.me/{{ $vendor->whatsapp_number }}" target="_blank"
               class="bg-green-600 text-white px-4 py-2 rounded shadow">WhatsApp</a>
        @endif
        @if($vendor->instagram)
            <a href="{{ $vendor->instagram }}" target="_blank" class="bg-pink-500 text-white px-4 py-2 rounded shadow">Instagram</a>
        @endif
        @if($vendor->facebook)
            <a href="{{ $vendor->facebook }}" target="_blank" class="bg-blue-700 text-white px-4 py-2 rounded shadow">Facebook</a>
        @endif
        @if($vendor->tiktok)
            <a href="{{ $vendor->tiktok }}" target="_blank" class="bg-black text-white px-4 py-2 rounded shadow">TikTok</a>
        @endif
    </div>
</div>
@endsection
