<?php

namespace App\Models;
use App\Models\panier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attribution extends Model
{
    protected $guarded=[];

    public function beneficiaire(){
        return $this->belongsTo('App\Models\beneficiaire', 'b_id', 'id');
    }

    public function panier(){
        return $this->belongsTo('App\Models\panier', 'p_id', 'id');
    }

}
