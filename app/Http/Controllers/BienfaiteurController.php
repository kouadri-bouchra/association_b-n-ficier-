<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\bienfaiteur;
use Illuminate\Http\Request;

class bienfaiteurController extends Controller
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
        return view('bienfaiteure.bienfaiteure',compact('bienfaiteure'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        bienfaiteur::create([
            
                'b_name' => $request->b_name,

                'sex' => $request->sex, 
                'region' => $request->region,
                'Ntelephone'=> $request->Ntelephone,
                'created_by'=>(Auth::user()->name),
            

        ]);
        session()->flash('Add', 'تم اضافة معلومات المتبرع بنجاح ');
        return redirect('/bienfaiteure');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bienfaiteur  $bienfaiteur
     * @return \Illuminate\Http\Response
     */
    public function show(bienfaiteur $bienfaiteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bienfaiteur  $bienfaiteur
     * @return \Illuminate\Http\Response
     */
    public function edit(bienfaiteur $bienfaiteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bienfaiteur  $bienfaiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $bienfaiteur=bienfaiteur::find($id);
        $bienfaiteur->update([
            'b_name' => $request->b_name,
           
            'sex' => $request->sex ,
            'region' => $request->region,
            'Ntelephone' => $request->Ntelephone,
            
        ]);

        session()->flash('edit','تم تعديل معلومات المتبرع بنجاج');
        return redirect('/bienfaiteure');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bienfaiteur  $bienfaiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        bienfaiteur::find($id)->delete();
        session()->flash('delete','تم حذف معلومات المتبرع بنجاح');
        return redirect('/bienfaiteure');
    }


}
