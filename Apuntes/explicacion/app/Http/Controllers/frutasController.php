<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormFrutasRequest;
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

    public function store(FormFrutasRequest $request)
    {
        $request->validated();

        // if ($request->input('nombre') != "Manzana") {
        //     return to_route('frutas')->withInput()
        //         ->with('mensaje', 'La fruta no es manzana');
        // }

        // Mensajes de error personalizados.
        /*
        $msg_error = [
            'nombre.required' => 'EL NOMBRE ES REQUERIDO',
            'nombre.min' => 'LA FRUTA DEBE TENER AL MENOS 5 LETRAS',
            'nombre.max' => 'LA FRUTA DEBE TENER COMO MAXIMO 10 LETRAS'
        ];
        */

        /*
        $request->validate([
            'nombre' => 'required|min:5|max:10|in:peras,fresas',
            'descripcion' => 'required|min:10|max:20',
            'pais' => 'required'
        ], $msg_error);
        */

        return "TODO CORRECTO!!";
    }
}
