<?php

namespace App\Livewire\Visitas;

use Livewire\Component;
use App\Models\Visit;


class ListadoVisitas extends Component
{

    public $visitas;

    public function mount()
    {
        
        $this->visitas = Visit::with('department')->get();
    } 

    public function render()
    {
        //!Logica de programacion

        return view('livewire.visitas.listado-visitas', [
            'visitas' => $this->visitas 
        ]);
    }
}
