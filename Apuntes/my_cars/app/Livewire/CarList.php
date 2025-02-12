<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarList extends Component
{
    public $nombre;
    public $search;
    public $campo_orden = "id";
    public $direccion = "desc";


    public function render()
    {
        $cars = Car::where('brand', 'like', '%' . $this->search . '%')
            ->orWhere('color', 'like', '%' . $this->search . '%')
            ->orderBy($this->campo_orden, $this->direccion)->get();
        return view('livewire.car-list')->with('cars', $cars);
    }

    public function ordenar($campo_orden)
    {
        $this->campo_orden = $campo_orden;
        $this->direccion = $this->direccion == "desc" ? "asc" : "desc";
    }
}
