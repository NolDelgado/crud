<?php

namespace App\Livewire\Visitas;

use Livewire\Component;
use App\Models\Visit;


class MostrarVisita extends Component
{

    public $visitas;
  

    public function mount()
    {
        $id = request()->query('id');

        $this->visitas = Visit::with('department','user')->findOrFail($id);
    } 


    public function render()
    {
        return view('livewire.visitas.mostrar-visita', ['visita' => $this->visitas]);
    }
}
