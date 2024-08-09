<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImages extends Model
{
    use HasFactory;
    protected $fillable =
        [
          'image'
        ];

    public function properties()
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }
}
