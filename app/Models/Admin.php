<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{
    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Optionally specify hidden attributes, like password
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Optionally specify casts for attributes
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the currently authenticated admin.
     *
     * @return \App\Models\Admin|null
     */
    public static function getAuthAdmin()
    {
        return Auth::guard('admin')->user();
    }
}
