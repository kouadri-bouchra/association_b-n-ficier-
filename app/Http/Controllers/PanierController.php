<?php namespace App\Http\Controllers;
use App\Models\panier;
use App\Models\product;
use App\Models\beneficiaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PanierController extends Controller
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
    { $panier = panier::all();
        return view('panier.index',compact('panier'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('panier.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        panier::create([
            'pdate' => $request->pdate,
            'b_name' => $request->nump,
        ]);
        session()->flash('Add', 'تم اضافة القسم بنجاح ');
        return redirect()->route('panier.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function show(panier $panier)
    {
        $beneficiaires = beneficiaire::all();
        return view('panier.show', compact('panier','beneficiaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function edit(panier $panier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $panier = panier::find($id);
        $panier->update([
            
            'b_name' => $request->nump,
            'pdate' => $request->pdate,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect()->route('panier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        panier::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/panier');
    }
}

