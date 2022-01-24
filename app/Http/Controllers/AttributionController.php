<?php

namespace App\Http\Controllers;

use App\Models\panier;
use App\Models\attribution;
use App\Models\beneficiaire;
use Illuminate\Http\Request;

class AttributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $beneficiaires = beneficiaire::all();
        $panier=panier::findOrFail($request->get('panier'));
        return view('attribution.index',compact('beneficiaires','panier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        attribution::create([
           
            'p_id' => $request->get('panier'),
            'b_id' => $request->get('beneficiaire'),

        ]);
        $panier=panier::findOrFail($request->get('panier'));
        //return redirect()->route('panier.show', compact('panier'));
        return redirect()->route('attributions.index', compact('panier'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function show(attribution $attribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function edit(attribution $attribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attribution $attribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function destroy($attribution)
    {
        $a=attribution::findOrFail($attribution);
        $panier=panier::findOrFail($a->p_id);
        $a->delete();
        $beneficiaires = beneficiaire::all();
        return view('attribution.index',compact('beneficiaires','panier'));

    }
}
