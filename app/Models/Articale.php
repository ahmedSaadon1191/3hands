<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articale extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function admin()
    {
       return $this->belongsTo(Admin::class);
    }

    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
