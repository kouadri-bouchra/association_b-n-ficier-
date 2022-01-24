<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liste_b extends Model
{
   // protected $fillable = ['bl_name','bl_lastame','p_type','pl_name','pl_quantite','pl_date'];
   protected $guarded=[];
    protected $table = 'liste_bs';
    public $timestamps=true; 


    public function product()
    {
        return $this->hasOne('App\Models\product', 'id', 'products_id');
    }

    public function bienfaiteur()
    {
        return $this->hasOne('App\Models\bienfaiteur', 'id', 'bienfaiteur_id');
    }
}

