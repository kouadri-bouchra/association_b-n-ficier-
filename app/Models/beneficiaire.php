<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beneficiaire extends Model
{
    //use HasFactory;
    protected $guarded=[];
   
    public function attribution()
    {
        return $this->hasMany('App\Models\attribution', 'b_id', 'id');
    }

    public function beneficiaireDe(panier $panier){
    	$attribution=Attribution::where('p_id', $panier->id)
    				->where('b_id', $this->id)
    				->first();
    	return $attribution;
    }
    
}

