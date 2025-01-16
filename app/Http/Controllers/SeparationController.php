<?php

namespace App\Http\Controllers;

use App\Models\Separation;
use App\Models\Product;
use Illuminate\Http\Request;

class SeparationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->level == 'administrador' || auth()->user()->level == 'usuario' ){
        $separations = separation::orderBy('created_at','DESC')->get();
        return view('validations.index',compact('separations'));
        }else{
            return redirect()->route('profile');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->level == 'administrador' || auth()->user()->level == 'usuario' ){
            $materials = Product::all()->sortDesc();
            return view('separations.create', compact('materials'));
        }
        else{
                return redirect()->route('profile');
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$image = $request->file('img');

        $separation = new Separation();
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $exten = $file->getClientOriginalExtension();
            $filename = time().".".$exten;
            $file->move('uploads/separation/',$filename);

        }
        $separation->user_id = $request->user_id;
        $separation->product_id = $request->product_id;
        $separation->weight = $request->weight;
        $separation->num_bags = $request->num_bags;
        $separation->m3 = $request->m3;
        $separation->qr_code = $request->qr_code;
        $separation->status = $request->status;
        $separation->notes = $request->notes;
        $separation->plantel = $request->plantel;
        $separation->payment = 0;
        $separation->merma = 0;
        
        $separation->img = $filename;
        if($separation->save()){
            return redirect()->route('separations.create')->with('success', 'Separación Agregada de Manera Exitosa');
        }
        else{
            return redirect()->route('separations.create')->with('warning', 'Error al guardar');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $separation = Separation::findOrFail($id);
        return view('separations.show', compact('separation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $separation = Separation::findOrFail($id);
        $materials = Product::all();
        return view('separations.edit', compact('separation','materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $separation = Separation::findOrFail($id);
        $separation->user_id = $request->user_id;
        $separation->modify_user_id = $request->modify_user_id;
        $separation->product_id = $request->product_id;
        $separation->weight = $request->weight;
        $separation->num_bags = $request->num_bags;
        $separation->m3 = $request->m3;
        $separation->qr_code = $request->qr_code;
        $separation->status = $request->status;
        $separation->notes = $request->notes;
        $separation->plantel = $request->plantel;
        if($separation->save()){
            return redirect()->route('validations')->with('success', 'Separación Actrualizada de Manera Exitosa');
        }
        else{
            return redirect()->route('validations')->with('warning', 'Error al guardar');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

       $separation = Separation::findOrFail($id);
       $separation->delete();
       return redirect()->route('validations')->with('success', 'Separación Eliminada de Manera Exitosa');
    }
}
