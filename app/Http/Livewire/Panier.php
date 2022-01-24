<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\contenus;
use App\Models\attribution;
use App\Models\panier as bouchra;

use App\Models\product;
use App\Models\beneficiaire;
class Panier extends Component
{
    public $currentStep=1;
    public $pdate;
    public $nump;
    public $name;
    public $c_name;
  
    
    public $quantite;
    public $lastame;
    public $products_id;
    public $b_id;
    public $pa_id; 
    public $p_id;  
    // public function FirstStep(){
    //     $this->currentStep = 1;
    // }

    // public function secStep(){
    //     $this->currentStep = 2;
    // }

    // public function thirStep(){
    //     $this->currentStep = 3;
    // }

    //   public function forStep(){
    //     $this->currentStep = 4;
    //   }

    public function firstStepSubmit()
    {
        $this->currentStep = 2;
    }
    public function firstSt()
    {
        $this->currentStep = 3;
    }  
    public function firstSt3()
    {
        $this->currentStep = 4;
    }
  
    
    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function render()
    {
        return view('livewire.panier',[
        'contenus'=>contenus::all(),
        'attribution'=>attribution::all(),
        'product'=>product::all(), 
        'bouchra'=>bouchra::all(), 
        'beneficiaire'=>beneficiaire::all(), 
        ]
    
    
    
    );
    }
    
      public function submitForm(){
    
      $v=bouchra::create([
            'nump' => $this->nump,
            'pdate' => $this->pdate,
           
        ]);
        contenus::create([
            'products_id'=> $this->products_id,
            'pa_id'=> $this->pa_id,
           
        ]);
        attribution::create([
            'b_id'=> $this->b_id,
            'p_id'=> $this->p_id,
           
        ]);
       
//    $i=new panier();
//    $i->nump=$this->nump;
//    $i->pdate=$this->pdate;
//    $i->name=$this->pl_name;
//    $i->pl_quantite=$this->pl_quantite;
//    $ii->c_name=$this->c_name;
//    $i->lastame=$this->lastame;
//    $i->save();
     }

   
}
