<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouse;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function create($slug)
    {
        $boardingHouse = BoardingHouse::where('slug', $slug)->firstOrFail();
        
        // Check if user already left a testimonial
        $existingTestimonial = Testimonial::where('user_id', auth()->id())
            ->where('boarding_house_id', $boardingHouse->id)
            ->first();
            
        if ($existingTestimonial) {
            return redirect()
                ->route('boarding-houses.show', $slug)
                ->with('error', 'Anda sudah memberikan testimoni untuk kos ini');
        }

        return view('user.testimonials.create', [
            'boardingHouse' => $boardingHouse
        ]);
    }

    public function store(Request $request, $slug)
    {
        // Validasi
        $validated = $request->validate([
            'content' => 'required|string|min:10|max:500',
            'rating' => 'required|integer|between:1,5',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $boardingHouse = BoardingHouse::where('slug', $slug)->firstOrFail();
            
            // Cek apakah user sudah pernah memberikan testimoni
            $existingTestimonial = Testimonial::where('user_id', auth()->id())
                ->where('boarding_house_id', $boardingHouse->id)
                ->first();
                
            if ($existingTestimonial) {
                return back()
                    ->withInput()
                    ->with('error', 'Anda sudah memberikan testimoni untuk kos ini');
            }

            // Upload foto jika ada
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('testimonials', 'public');
            }

            // Simpan testimonial
            Testimonial::create([
                'content' => $validated['content'],
                'rating' => $validated['rating'],
                'user_id' => auth()->id(),
                'boarding_house_id' => $boardingHouse->id,
                'photo' => $photoPath
            ]);

            return redirect()
                ->route('boarding-houses.show', $slug)
                ->with('success', 'Testimoni berhasil ditambahkan!');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal menyimpan testimoni: '.$e->getMessage());
        }
    }
}