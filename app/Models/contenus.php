<?php

namespace App\Models;
use App\Models\contenus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contenus extends Model
{
    protected $guarded=[];

    public function paniers()
    {
        return $this->belongsTo('App\Models\panier', 'id', 'pa_id');
        
    }
    public function produit()
    {
        return $this->belongsTo('App\Models\product', 'products_id', 'id');
        
    }
}
