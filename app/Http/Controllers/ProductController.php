<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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




        $products = product::all();
        return view('product.product',compact('products'));
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
        product::create([
            
            'name' => $request->name,
            'quantite' => $request->quantite,
            'type' => $request->type, 
            'created_by'=>(Auth::user()->name),
        

    ]);
    session()->flash('Add', 'تم اضافة القسم بنجاح ');
    return redirect('/product');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    
        $id = $request->id;
        
            
        $product=product::find($id);
        $product->update([
            'name' => $request->name,
            'quantite' => $request->quantite,
            'type' => $request->type,
            
            
        ]);
       
        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/product');


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $id = $request->id;
        product::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/products');
    }
}
