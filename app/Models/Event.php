<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'vendor_id',
        'name',
        'description',
        'event_date',
        'image',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
