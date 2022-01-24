<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panier extends Model
{
    protected $guarded=[];

    public function contenus()
    {
        return $this->hasMany('App\Models\contenus', 'pa_id', 'id');
    }

    public function attributions()
    {
        return $this->hasMany('App\Models\attribution', 'p_id', 'id');
    }
}
