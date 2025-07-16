<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name', 'image'];

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

}
