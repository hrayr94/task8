<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'building_age',
        'bedrooms',
        'bathrooms',
        'air_conditioning',
        'swimming_pool',
        'central_heating',
        'laundry_room',
        'gym',
        'alarm',
        'window_covering',
        'contact_name',
        'contact_email',
        'contact_phone',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
