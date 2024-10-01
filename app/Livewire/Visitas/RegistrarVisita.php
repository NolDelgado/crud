<?php

namespace App\Livewire\Visitas;

use App\Models\Department;
use Livewire\Component;

class RegistrarVisita extends Component
{
    public function render()
    {
        //! Debemos de traer los departamentos para poder mostrarlos en el select
        $departments = Department::all();

        return view('livewire.visitas.registrar-visita');
    }
}
