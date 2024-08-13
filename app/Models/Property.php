<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;


    const STATUS_SALE = 0;
    const STATUS_RENT = 1;
    const TYPE_APARTMENT = 0;
    const TYPE_HOUSE = 1;
    const TYPE_COMMERCIAL = 2;
    const TYPE_GARAGE = 3;
    const TYPE_LOT = 4;


    const STATUSES = [
        self::STATUS_SALE => 'For Sale',
        self::STATUS_RENT => 'For Rent',
    ];

    const TYPES = [
        self::TYPE_APARTMENT => 'Apartment',
        self::TYPE_HOUSE => 'House',
        self::TYPE_COMMERCIAL => 'Commercial',
        self::TYPE_GARAGE => 'Garage',
        self::TYPE_LOT => 'Lot',
    ];

    const ROOMS = [
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => 'More than 5',
    ];

    const BUILDING_AGES = [
        '0 - 1 Years' => '0 - 1 Years',
        '0 - 5 Years' => '0 - 5 Years',
        '0 - 10 Years' => '0 - 10 Years',
        '0 - 20 Years' => '0 - 20 Years',
        '0 - 50 Years' => '0 - 50 Years',
        '50 + Years' => '50 + Years',
    ];

    protected $fillable = [
        'title', 'status', 'type', 'price', 'area', 'rooms', 'address', 'city', 'state', 'zip_code', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(PropertyImages::class, 'property_id', 'id');
    }

    public function details()
    {
        return $this->hasOne(PropertyDetails::class, 'property_id', 'id');
    }


    public static function getStatuses()
    {
        return self::STATUSES;
    }

    public static function getTypes()
    {
        return self::TYPES;
    }

    public static function getRooms()
    {
        return self::ROOMS;
    }


    public function getStatusLabel()
    {
        return self::STATUSES[$this->status] ?? 'Unknown';
    }

    public function getTypeLabel()
    {
        return self::TYPES[$this->type] ?? 'Unknown';
    }

    public function getRoomLabel()
    {
        return self::ROOMS[$this->rooms] ?? 'Unknown';
    }
}
