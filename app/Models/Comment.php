<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\Articale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function admin()
    {
       return $this->belongsTo(Admin::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function articale()
    {
       return $this->belongsTo(Articale::class);
    }


   
}
