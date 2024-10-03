<?php

namespace App\Livewire\Visitas;

use Livewire\Component;
use App\Models\Visit;


class ListadoVisitas extends Component
{

    public $visitas;

    public function mount()
    {
        
        $this->visitas = Visit::with('department','user')->get();
    } 
    protected $listeners = ['eliminarVisita', 'ocultaModal'];
    public $esVisible = false;

    public function render()
    {
        $visitas = auth()->user()->visitas;
        //!Logica de programacion

        return view('livewire.visitas.listado-visitas',['visitas' => $visitas]);
      
    }


    public function mostrarModal()
    {
        $this->esVisible = true;
    }
    public function eliminarVisita()
    {
        auth()->user()->visitas()->delete();
        $this->esVisible = false;
    }
    public function ocultaModal()
    {
        $this->esVisible = false;
    }
}
