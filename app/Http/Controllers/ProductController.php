<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->level == 'administrador' ){
            $product = Product::orderBy('created_at','DESC')->get();
            return view('materials.index',compact('product'));
        }
        else{
            return redirect()->route('dashboard');
        }
        
    }

    public function pricelist()
    {
        if(auth()->user()->level == 'administrador' ||  auth()->user()->level == 'recolector'){
        $product = Product::orderBy('created_at','DESC')->get();
        return view('materials.pricelist',compact('product'));
        }else{
            return redirect()->route('profile');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->level == 'administrador'){
        return view('materials.create');
        }else{
            return redirect()->route('profile');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(auth()->user()->level == 'administrador'){
            Product::create($request->all());
            return redirect()->route('materials')->with('success', 'Producto Agregado de Manera Exitosa');
            }else{
                return redirect()->route('profile');
            }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->level == 'administrador'){
            $product = Product::findOrFail($id);
            return view('materials.show', compact('product'));
            }else{
                return redirect()->route('profile');
            }
       
    }

    public function pricelistEdit(string $id)
    {
        if(auth()->user()->level == 'administrador' ||  auth()->user()->level == 'recolector'){
            $product = Product::findOrFail($id);
            return view('materials.pricelistEdit', compact('product'));
            }else{
                return redirect()->route('profile');
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(auth()->user()->level == 'administrador'){
            $product = Product::findOrFail($id);
            return view('materials.edit', compact('product'));
            }else{
                return redirect()->route('profile');
        }    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(auth()->user()->level == 'administrador'){
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return redirect()->route('materials')->with('success', 'Producto Actualizado de Manera Exitosa');
            }else{
                return redirect()->route('profile');
        }    
      
    }

    public function pricelistUpdate(Request $request, string $id)
    {
        if(auth()->user()->level == 'administrador' || auth()->user()->level == 'recolector'){
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return redirect()->route('materials.pricelist')->with('success', 'Producto Actualizado de Manera Exitosa');
            }else{
                return redirect()->route('profile');
        }    
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $product = Product::findOrFail($id);
       $product->delete();
       return redirect()->route('materials')->with('success', 'Producto Eliminado de Manera Exitosa');
    }
}
