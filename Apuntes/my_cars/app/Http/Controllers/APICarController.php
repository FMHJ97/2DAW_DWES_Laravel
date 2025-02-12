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
        // Creamos un nuevo coche con los datos recibidos
        // sin realizar ninguna validación.
        $car = Car::create($request->all());
        // Devolvemos un JSON con el coche creado.
        return response()->json([
            'status' => 'success',
            'msg' => 'Coche creado correctamente',
        ], 201); // Código HTTP 201 => Created.
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
        // Recuperamos el coche por su ID.
        $car = Car::find($id);
        // Actualizamos el coche con los datos recibidos.
        $car->update($request->all());
        // Devolvemos un JSON con el coche actualizado.
        return response()->json([
            'status' => 'success',
            'msg' => 'Coche actualizado correctamente',
        ], 200); // Código HTTP 200 => OK.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recuperamos el coche por su ID.
        $car = Car::find($id);
        // Eliminamos el coche.
        $car->delete();
        // Devolvemos un JSON con el coche eliminado.
        return response()->json([
            'status' => 'success',
            'msg' => 'Coche eliminado correctamente',
        ], 200); // Código HTTP 200 => OK.
    }
}
