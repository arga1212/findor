<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorEvent extends Model
{
    protected $fillable = ['vendor_id', 'name', 'description', 'event_date'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
