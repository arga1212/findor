<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\City;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $vendors = Vendor::with(['reviews'])
            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->when($request->city, function ($query) use ($request) {
                $query->where('city_id', $request->city);
            })
            ->latest()
            ->get();

        return view('welcome', [
            'vendors' => $vendors,
            'categories' => Category::all(),
            'cities' => City::all(),
        ]);
    }
}
