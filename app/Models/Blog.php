<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'description', 'image'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
