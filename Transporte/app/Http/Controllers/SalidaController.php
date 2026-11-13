<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'destino' => 'required'
        ]);
        $salida = Salida::create($datos);
    }

    /**
     * Display the specified resource.
     */
    public function show(Salida $salida)
    {

        return response()->json($salida);
    }

    public function filtro(Request $request)
    {
        return response()->json($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salida $salida)
    {
        $datos = $request->validate([
            'id' => 'required',
            'capacidad' => 'required'
        ]);

        return $salida->update($datos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salida $salida)
    {
        //
    }
}
