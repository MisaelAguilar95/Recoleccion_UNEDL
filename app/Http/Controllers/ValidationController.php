<?php

namespace App\Http\Controllers;
use App\Models\Separation;

class ValidationController extends Controller
{
    /**
     * Lista de Separaciónes a Validar
     */
    public function index()
    {
        $separations = Separation::all();
        return view('validations.index',compact('separations'));
    }

    /**
     * Valida la separación
     */
    public function validated(string $id)
    {
        Separation::where('id', $id)->update(array('status' => 'validated', 'validated_by' => auth()->user()->name));
        return redirect()->route('validations')->with('success', 'Separación Validada Lista para Recolección');
    }
}
