<?php

namespace App\Http\Controllers;
use App\Models\panier;
use App\Models\product;

use App\Models\contenus;
use Illuminate\Http\Request;

class ContenusController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $panier=panier::findOrFail($request->get('panier'));
        $articles=product::all();
        return view('contenus.create',compact('articles','panier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        contenus::create([
            'products_id' => $request->article,
            'name' => '.',
            'quantite' => $request->quantite,
            'pa_id' => $request->get('panier'),
        ]);
        $panier=panier::findOrFail($request->get('panier'));
        return redirect()->route('panier.show', compact('panier'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contenus  $contenus
     * @return \Illuminate\Http\Response
     */
    public function show(contenus $contenus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contenus  $contenus
     * @return \Illuminate\Http\Response
     */
    public function edit(contenus $contenus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contenus  $contenus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contenus $contenus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contenus  $contenus
     * @return \Illuminate\Http\Response
     */
    public function destroy(contenus $contenus)
    {
        //
    }
}
