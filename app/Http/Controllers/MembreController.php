<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Membre;
use Illuminate\Http\Request;

class MembreController extends Controller
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

       

        $membre=Membre::all();

        return view('members.member',compact('membre'));
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
         // التاكد من التسجيل مسبقا
    $validatedData =$request->validate([
        'name' =>'required|max:255',
        'lastname' =>'required|max:255',
        'email' =>'required|max:255',
        'Ntelephone' =>'required|max:255',
        'wilaya' =>'required|max:255',
    ],[
        'name.required'=>'يرجى ادخال الاسم ',
        'lastname.required'=>'يرجى ادخال اللقب ',
        'email.required'=>'يرجى ادخال البريد الالكتروني',
        'Ntelephone.required'=>'يرجى ادخال رقم الهاتف',
        'wilaya.required'=>'يرجى ادخال الولاية',




    ]);
    
        Membre::create([
'name' =>$request->name,
'lastname' =>$request->lastname,
'wilaya' =>$request->wilaya,
'email' =>$request->email,
'Ntelephone' =>$request->Ntelephone,
'user_id'=>Auth::user()->id,
]);
session()->flash('Add','تم اضافة معلومات العضو بنجاح');
return redirect('/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function show(Membre $membre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function edit(Membre $membre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|max:255,'.$id,
            'lastname' =>'required|max:255',
            'email' =>'required|max:255',
            'Ntelephone' =>'required|max:255',
            'wilaya' =>'required|max:255',
        ],[
            'name.required'=>'يرجى ادخال الاسم ',
            'lastname.required'=>'يرجى ادخال اللقب ',
            'email.required'=>'يرجى ادخال البريد الالكتروني',
            'Ntelephone.required'=>'يرجى ادخال رقم الهاتف',
            'wilaya.required'=>'يرجى ادخال الولاية',
    

        ]);

        $Membre = Membre::find($id);
        $Membre->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'Ntelephone' => $request->Ntelephone,
            'wilaya' => $request->wilaya,
        ]);

        session()->flash('edit','تم تعديل معلومات العضو بنجاج');
        return redirect('/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Membre::find($id)->delete();
        session()->flash('delete','تم حذف معلومات العضو بنجاح');
        return redirect('/members');
    }
}
