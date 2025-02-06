<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cars.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plate' => 'required|unique:cars,plate', // The plate must be unique in the cars table.
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'revision_date' => 'required|date',
            'image' => 'required|image',
            'price' => 'required|numeric|min:0',
        ]);

        $new_car = new Car();
        $new_car->plate = $request->plate;
        $new_car->brand = $request->brand;
        $new_car->model = $request->model;
        $new_car->year = $request->year;
        $new_car->color = $request->color;
        $new_car->revision_date = $request->revision_date;
        $new_car->price = $request->price;
        $new_car->user_id = Auth::id(); // Get the id of the authenticated user.

        // Save the image in the public folder.
        $name_image = time() . "_" . $request->file('image')->getClientOriginalName(); // Get the name of the image.
        $new_car->image = $name_image; // Save the name of the image in the database.

        // Save the car in the database.
        $new_car->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
