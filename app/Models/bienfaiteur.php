<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bienfaiteur extends Model
{
    protected $guarded=[];

public function list()
{
    return $this->hasMany('App\Models\liste_b', 'id', 'bienfaiteur_id');
    
}
}