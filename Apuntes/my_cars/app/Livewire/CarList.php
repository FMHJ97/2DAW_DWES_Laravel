<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

#[On('insert_coche')]

class CarList extends Component
{

    /*
    Permite la paginación de los registros de la tabla cars.
    WithoutUrlPagination: Permite que la paginación no se vea reflejada
    en la URL.
    */
    use WithPagination, WithoutUrlPagination;

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

    /*
    Nos permite actualizar la tabla de registros cada vez que se
    realiza una búsqueda.
    */
    public function updateSearch() {
        $this->resetPage();
    }
}
