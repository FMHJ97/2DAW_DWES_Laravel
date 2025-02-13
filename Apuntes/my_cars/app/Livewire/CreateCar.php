<?php

namespace App\Livewire;

use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class CreateCar extends Component
{

    use WithFileUploads;

    public $mostrar = false;

    // Propiedades del formulario.
    #[Validate('required|max:7')]
    public $plate;
    #[Validate('required|min: 5')]
    public $brand;
    #[Validate('required', 'max:50')]
    public $model;
    #[Validate('required', 'max:50')]
    public $color;
    #[Validate('required', 'integer')]
    public $year;
    #[Validate('required', 'date')]
    public $revision_date;
    #[Validate('required', 'numeric', 'min:0')]
    public $price;
    #[Validate('required', 'image')]
    public $image;

    public function render()
    {
        return view('livewire.create-car');
    }

    public function mostrarForm()
    {
        if ($this->mostrar) {
            $this->mostrar = false;
        } else {
            $this->mostrar = true;
        }
    }

    public function guardarCoche()
    {
        // Validar los campos del formulario.
        $this->validate();

        $nombrefoto = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('img_cars', $nombrefoto);
        Car::create([
            'plate' => $this->plate,
            'brand' => $this->brand,
            'model' => $this->model,
            'color' => $this->color,
            'year' => $this->year,
            'revision_date' => $this->revision_date,
            'price' => $this->price,
            'image' => $this->image,
            'user_id' => Auth::id()
        ]);
        // Cerramos el formulario.
        $this->mostrar = false;

        // Limpiamos los campos del formulario.
        $this->reset();

        // Disparar un evento para que se actualice la tabla.
        $this->dispatch('insert_coche');
    }
}
