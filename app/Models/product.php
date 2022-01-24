<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded=[];
    public function articles()
    {
        return $this->hasMany('App\Models\contenus', 'products_id', 'id');
    }
    public function donnations()
    {
        return $this->hasMany('App\Models\liste_b', 'id', 'products_id');
        
    }
}
