<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Articale;
use App\Models\Category;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function articales()
    {
        return $this->hasMany(Articale::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
