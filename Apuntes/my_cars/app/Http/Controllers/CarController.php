<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::id()); // Get the authenticated user.
        $cars = $user->cars()->OrderBy('plate')->get(); // Get the cars of the authenticated user.
        return view('cars.index')->with('cars', $cars);
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
            // The plate must be unique in the cars table, except for the current car.
            'plate' => 'required|unique:cars,plate,NULL,id,deleted_at,NULL',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'revision_date' => 'required|date',
            'image' => 'required|image',
            'price' => 'required|numeric|min:0',
        ]);

        try {

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

            // Move the image to the public folder.
            $request->file('image')->storeAs('img_cars', $name_image);

            // Redirect to the index view.
            return to_route('cars.index')->with('msg', 'Car created successfully.');
            // return view('cars.index')->with('msg', 'Car created successfully.');
        } catch (QueryException $qe) {
            return to_route('cars.index')->with('msg', 'Error creating the car. Try again later.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $url = 'storage/img_cars/';
        return view('cars.show')->with('mycar', $car)->with('url', $url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $url = 'storage/img_cars/';
        return view('cars.edit')->with('mycar', $car)->with('url', $url);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            // The plate must be unique in the cars table, except for the current car.
            'plate' => 'required|unique:cars,plate,' . $car->id . ',id,deleted_at,NULL',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'revision_date' => 'required|date',
            'image' => 'image',
            'price' => 'required|numeric|min:0',
        ]);

        try {


            $car->plate = $request->plate;
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->color = $request->color;
            $car->revision_date = $request->revision_date;
            $car->price = $request->price;

            // If the user uploads a new image.
            if (is_uploaded_file($request->file('image'))) {
                // Delete the old image.
                Storage::delete('img_cars/' . $car->image);
                // Save the image in the public folder.
                $name_image = time() . "_" . $request->file('image')->getClientOriginalName(); // Get the name of the image.
                $car->image = $name_image; // Save the name of the image in the database.
                // Move the image to the public folder.
                $request->file('image')->storeAs('img_cars', $name_image);
            }

            // Save the car in the database.
            $car->save();

            // Redirect to the index view.
            return to_route('cars.index')->with('msg', 'Car UPDATED successfully.');
            // return view('cars.index')->with('msg', 'Car created successfully.');
        } catch (QueryException $qe) {
            return to_route('cars.index')->with('msg', 'Error creating the car. Try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        // Storage::delete('img_cars/' . $car->image); // Delete the image of the car.
        return to_route('cars.index')->with('msg', 'Car deleted successfully.');
    }
}
