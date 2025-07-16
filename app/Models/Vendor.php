<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vendor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'whatsapp_number',
        'instagram',
        'facebook',
        'tiktok',
        'thumbnail',
        'price_range',
        'is_verified',
        'slug', // ✅ pastikan slug disertakan di fillable
    ];

    // ✅ Relasi ke paket (one to many)
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    // ✅ Relasi ke event (one to many)
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    // ✅ Relasi ke kategori (many to many)
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    // ✅ Relasi ke kota (many to many)
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class);
    }

    // ✅ Relasi ke properti (many to many)
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class);
    }

    // ✅ Relasi ke ulasan (one to many)
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
