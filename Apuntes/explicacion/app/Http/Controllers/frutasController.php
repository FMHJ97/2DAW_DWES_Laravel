<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frutasController extends Controller
{
    public function index()
    {
        return view('frutas.index')->with('frutas', array(
            'naranja',
            'pera',
            'manzana',
            'fresa',
            'melon',
            'sandia'
        ));
    }

    public function naranjas($pais = "España")
    {
        return "Naranjas de $pais";
    }

    public function peras()
    {
        return "Peras";
    }

    // public function store(Request $request){
    //     return $request->input('nombre');
    // }

    public function store(Request $request)
    {
        // if ($request->input('nombre') != "Manzana") {
        //     return to_route('frutas')->withInput()
        //         ->with('mensaje', 'La fruta no es manzana');
        // }

        $request->validate([
            'nombre' => 'required|max:5',
            'descripcion' => 'required|min:10|max:20',
            'pais' => 'required'
        ]);

        return "TODO CORRECTO!!";
    }
}
