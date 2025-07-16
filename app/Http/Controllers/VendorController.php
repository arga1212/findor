<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function home()
    {
        $vendors = Vendor::with(['categories', 'cities', 'reviews'])->latest()->take(6)->get();
        return view('welcome', compact('vendors'));
    }

    public function index(Request $request)
    {
        $query = Vendor::with(['categories', 'cities', 'reviews']);

        if ($request->filled('category_id')) {
            $query->whereHas('categories', fn($q) => $q->where('id', $request->category_id));
        }

        if ($request->filled('city_id')) {
            $query->whereHas('cities', fn($q) => $q->where('id', $request->city_id));
        }

        $vendors = $query->latest()->get();
        $categories = Category::all();
        $cities = City::all();

        return view('vendors.index', compact('vendors', 'categories', 'cities'));
    }

    public function show(Vendor $vendor)
    {
        $vendor->load([
            'categories',
            'cities',
            'properties', // jika properti punya gambar
            'packages.properties',
            'events',
            'reviews',
        ]);

        return view('vendors.show', compact('vendor'));
    }
}
