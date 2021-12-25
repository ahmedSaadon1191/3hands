<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Articale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function admin()
    {
       return $this->belongsTo(Admin::class);
    }

    public function articales()
    {
        return $this->hasMany(Articale::class);
    }
}
