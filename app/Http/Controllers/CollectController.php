<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Validation;
use App\Models\Product;
use App\Models\Separation;
use App\Models\Collect;
use App\Mail\CollectCall;
use App\Mail\PaidMail;
use App\Models\User;


class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $separations = Separation::where('status', '=','validated')->get();
        $users = User::where('level', '=','recolector')->get();
        //dd($users);
        return view('collections.index',compact('separations', 'users'));
    }

    public function view()
    {
        $separations = Separation::all();
        $collections = Collect::all();
        $materials = Product::all();
        $users = User::where('level', '=','recolector')->get();
        //dd($users);
        return view('collections.view',compact('separations','collections', 'users','materials'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$image = $request->file('img');

        $validation = new Validation();
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $exten = $file->getClientOriginalExtension();
            $filename = time().".".$exten;
            $file->move('uploads/validation',$filename);

        }
        $validation->user_id = $request->user_id;
        $validation->product_id = $request->product_id;
        $validation->weight = $request->weight;
        $validation->num_bags = $request->num_bags;
        $validation->qr_code = $request->qr_code;
        $validation->notes = $request->notes;
        $validation->img = $filename;
        if($validation->save()){
            return redirect()->route('validations.create')->with('success', 'Separación Agregada de Manera Exitosa');
        }
        else{
            return redirect()->route('validations.create')->with('warning', 'Error al guardar');
        }
    }

    /**
     * Display the specified resource.
     */
    public function collect(Request $request, string $id)
    {
        Separation::where('id', $id)->update(array('status' => 'collected'));
        $collect = new Collect();
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $exten = $file->getClientOriginalExtension();
            $filename = time().".".$exten;
            $file->move('uploads/collects/',$filename);

        }
        $collect->separation_id = $request->separation_id;
        $collect->collected_by = $request->collected_by;
        $collect->notes = $request->notes;
        $collect->img = $filename;
        if($collect->save()){
            return redirect()->route('collections')->with('success', 'Recolección Creada de manera Exitosa');
        }
        else{
            return redirect()->route('collections')->with('warning', 'Error al guardar Recolección');
        }
    }

    public function payment(Request $request, string $id)
    {
        Separation::where('id', $id)->update(array('status' => 'paid', 'payment' => $request->payment, 'merma' => $request->merma));
        if($request->hasfile('img_merma'))
        {
            $file = $request->file('img_merma');
            $exten = $file->getClientOriginalExtension();
            $filename = time().".".$exten;
            $file->move('uploads/merma/',$filename);

        }
        
        if($collect = Collect::where('separation_id',$id)->update(array('notes' => $request->notes, 'img_merma' =>$filename))){
            $receivers = 'misadina95@gmail.com';
            $data = Separation::all();
            Mail::to($receivers)->send(new PaidMail($data));
            return redirect()->route('collections')->with('success', 'Recolección Creada de manera Exitosa');
        }
        else{
            return redirect()->route('collections')->with('warning', 'Error al guardar Recolección');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd('here');
        $separation = Separation::findOrFail($id);
        return view('separations.edit', compact('separation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $validation = Validation::findOrFail($id);
       $validation->update($request->all());
       return redirect()->route('validations')->with('success', 'Separación Actualizada de Manera Exitosa');
    }

    public function sendMail(){
        $receivers = 'misadina95@gmail.com';
        $data = Separation::all();
        Mail::to($receivers)->send(new CollectCall($data));
        return redirect()->route('collections')->with('success', 'Alerta a Recolector Enviada Con Éxito!');
    
    }

    public function paid()
    {
        $separations = Separation::where('status', '=','paid')->get();
        return view('payments.index',compact('separations'));
    }
   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
   
       $separation = Separation::findOrFail($id);
       $separation->delete();
       return redirect()->route('collections')->with('success', 'Separación Eliminada de Manera Exitosa');
    }
}
