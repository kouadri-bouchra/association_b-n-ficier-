<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\liste_b;
use App\Models\product;
use App\Models\bienfaiteur;

use Illuminate\Http\Request;

class ListeBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('auth');
    }
    public function index()
    {
       
           
    
        $bienfaiteure = bienfaiteur::all();
        $liste_b = liste_b::with('product')->with('bienfaiteur')->get();
        $product = product::all();
        // dd($liste_b);
        return view('list.list',compact('liste_b','bienfaiteure','product'));
        
        
      
 
    }
    public function searchBydate(Request $request){
        $bienfaiteure = bienfaiteur::all();
        $liste_b = liste_b::where('created_at','>=',$request->from)->where('created_at','<=',$request->to)->get();
        return view('list.list',compact('liste_b','bienfaiteure'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        liste_b::create([
            
           
            'quantite' => $request->quantite,
            'products_id' => $request->get('pl_name'),
            'bienfaiteur_id' => $request->get('b_name'),

    ]);
    $product=product::findOrFail($request->get('pl_name'));

    $product->update([
        'quantite' => $product->quantite+$request->quantite, 
   ]);

    session()->flash('Add', 'تم اضافة القسم بنجاح ');
    return redirect('/list');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\liste_b  $liste_b
     * @return \Illuminate\Http\Response
     */
    public function show(liste_b $liste_b)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\liste_b  $liste_b
     * @return \Illuminate\Http\Response
     */
    public function edit(liste_b $liste_b)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\liste_b  liste_b
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    //   dd($request->all());
        
        // $liste_b = new liste_b();
        //  $liste_b->
         Liste_b::where('id', $request->id)->update([
             'products_id' => $request->pl_name,
             'bienfaiteur_id' => $request->b_name,
             'quantite' => $request->quantite,
        ]);
         session()->flash('edit','تم تعديل التبرع بنجاج');
        return redirect('/list');

    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\liste_b  $liste_b
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->id;
        liste_b::find($id)->delete();
        session()->flash('delete','تم حذف التبرع بنجاح');
        return redirect('/list');

    }
}
