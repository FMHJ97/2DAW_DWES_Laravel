<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frutasController extends Controller
{
    public function index(){
        return view('frutas.index')->with('frutas', array(
            'naranja',
            'pera',
            'manzana',
            'fresa',
            'melon',
            'sandia'
        ));
    }

    public function naranjas($pais="España"){
        return "Naranjas de $pais";
    }

    public function peras(){
        return "Peras";
    }

    // public function store(Request $request){
    //     return $request->input('nombre');
    // }

    public function store(Request $request){
        if ($request->input('nombre') != "Manzana") {
            return to_route('frutas')->withInput();
        }
        return $request->all();
    }
}