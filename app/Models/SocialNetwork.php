<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'twitter', 'facebook', 'google', 'linkedin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
