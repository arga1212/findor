<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'vendor_id',
        'name',
        'description',
        'price',
        'capacity',  // ✅ Tambah kapasitas
        'image',     // ✅ Tambah foto
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
