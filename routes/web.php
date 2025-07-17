<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\VendorController;
use App\Models\Vendor;

// Halaman Welcome — Mengirim vendor favorit ke view
Route::get('/', function () {
    // Tambahkan relasi 'reviews' agar rating bisa dihitung di Blade
    $vendors = Vendor::with(['categories', 'cities', 'reviews'])->latest()->take(6)->get();
    return view('welcome', compact('vendors'));
})->name('welcome');

// Detail vendor berdasarkan slug
Route::get('/vendor/{vendor}', [VendorController::class, 'show'])->name('vendor.show');

// Halaman semua vendor + pencarian by kategori & kota
Route::get('/vendor', [VendorController::class, 'index'])->name('cari.vendor');

// Route pencarian versi ajax atau pencarian tambahan jika diperlukan
Route::get('/cari', [LandingController::class, 'search'])->name('search.vendor');

// Group route untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
// Rute-rute seperti /login, /register, /forgot-password, dll.
// ditangani oleh file auth.php yang disertakan di sini.
require __DIR__.'/auth.php';
