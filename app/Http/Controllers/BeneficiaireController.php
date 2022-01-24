<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\beneficiaire;
use Illuminate\Http\Request;
class beneficiaireController extends Controller
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
        
        $beneficiaires = beneficiaire::all();
       
        return view('beneficiaires.beneficiaires',compact('beneficiaires'));
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

     

        beneficiaire::create([
                'c_name' => $request->c_name,
                'lastame' => $request->lastame,
                'sex' => $request->sex, 
                'region' => $request->region,
                'Ntelephone'=> $request->Ntelephone,
                'type' => $request->type,
                

            ]);
            session()->flash('Add', 'تم اضافة معلومات المستفيد بنجاح ');
            return redirect('/beneficiaires');

        }



    /**
     * Display the specified resource.
     *
    *  @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(beneficiaire $beneficiaires)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\beneficiaire  $beneficiaires
     * @return \Illuminate\Http\Response
     */
    public function edit(beneficiaire $beneficiaires)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\beneficiaire  $beneficiaires
     * @return \Illuminate\Http\Response
     */
   public function update( Request $request)
    {
        
      
        $id = $request->id;

        $this->validate($request, [

            'c_name' => 'required|max:255,'.$id,
            'lastame' =>'required|max:255',
            'sex' =>'required|max:255',
            'region' =>'required|max:255',
            'type' =>'required|max:255',
            'Ntelephone' =>'required|max:255',
        ],[
            'c_name.required'=>'يرجى ادخال الاسم ',
            'lastame.required'=>'يرجى ادخال اللقب ',
            'sex.required'=>'يرجى ادخال البريد الجنس',
            'region.required'=>'يرجى ادخال رقم المنطقة',
            'type.required'=>'يرجى ادخال النوع',
            'Ntelephone.required'=>'يرجى ادخال رقم الهاتف',

        ]);

        $beneficiaire= beneficiaire::find($id);
        
        $beneficiaire->update([
        'c_name' => $request->c_name,
        'lastame' => $request->lastame,
        'sex' => $request->sex ,
        'region' => $request->region,
        'Ntelephone' => $request->Ntelephone,
        'type' => $request->type, 
        
        ]);
 
        session()->flash('edit', 'تم تعديل معلومات المستفيد بنجاح');
        return redirect('/beneficiaires');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\beneficiaire  $beneficiaires
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
       beneficiaire::find($id)->delete();
      
       session()->flash('delete','تم حذف معلومات المستفيد بنجاح');
       return redirect('/beneficiaires');
   }
}


