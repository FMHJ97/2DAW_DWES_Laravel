<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class APICarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperamos todos los coches.
        $cars = Car::all();
        // Devolvemos un JSON con todos los coches.
        return response()->json([
            'status' => 'success',
            'cars' => $cars,
            'msg' => 'Listado de coches'
        ], 200); // Código HTTP 200 OK.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Recuperamos el coche por su ID.
        $car = Car::find($id);
        // Devolvemos un JSON con el coche.
        return response()->json([
            'status' => 'success',
            'car' => $car,
            'msg' => 'Coche recuperado'
        ], 200); // Código HTTP 200 OK.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
