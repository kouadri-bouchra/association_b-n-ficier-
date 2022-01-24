<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
class CategorieController extends Controller
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
        $categories = categories::all();
        return view('categories.categories',compact('categories'));
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

        
        categories::create([
                'name' => $request->name,
                
                

            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح ');
            return redirect('/categories');

        }



    /**
     * Display the specified resource.
     *
    *  @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categories
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request)
    {
        $id = $request->id;

      

        $categories= categories::find($id);
        $categories->update([
            'name' => $request->name,
            
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        categories::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/categories');
    }
}