<?php

namespace App\Http\Controllers;

use App\Models\Posicion;
use Illuminate\Http\Request;

class PosicionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Posicion::with(['empresa', 'producto'])
            ->get();
        $positions->sortByDesc('usoFrecuente');

        return response()->json([
            'message' => 'Lista de posiciones obtenida correctamente',
            'data' => $positions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idEmpresa' => 'required|exists:empresas,id',
            'idProducto' => 'required|exists:productos,id',
            'fechaEntregaInicio' => 'required|date|after_or_equal:today',
            'moneda' => 'required|in:AR$,USD',
            'precio' => 'required|numeric|min:0',
        ]);

        Posicion::create($validatedData);

        return response()->json([
            'message' => 'Posición creada correctamente',
            'data' => $validatedData
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Posicion $posicion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posicion $posicion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posicion $posicion)
    {
        //
    }
}
