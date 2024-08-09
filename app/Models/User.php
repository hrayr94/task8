<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'title',
        'phone',
        'about',
        'profile_photo_path'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function socialNetwork()
    {
        return $this->hasOne(SocialNetwork::class);
    }
}
