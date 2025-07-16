<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    protected $fillable = ['vendor_id', 'image_path'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}

