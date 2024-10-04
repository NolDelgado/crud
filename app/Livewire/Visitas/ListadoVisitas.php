<?php

namespace App\Livewire\Visitas;

use Livewire\Component;
use App\Models\Visit;


class ListadoVisitas extends Component
{
    protected $listeners = ['eliminarVisita', 'ocultaModal'];
    public $visitas;
    public $esVisible = false;

    public function mount()
    {

        $this->visitas = Visit::with('department', 'user')->get();
    }

    public function render()
    {
        $visitas = auth()->user()->visitas;
        //!Logica de programacion

        return view('livewire.visitas.listado-visitas', ['visitas' => $visitas]);
    }


    public function mostrarModal()
    {
        $this->esVisible = true;
    }

    public function eliminarVisita(Visit $visita)
    {
        //dd($visita);
        //TODO Agregar un on delete cascade en la base de datos para que se elimine el qr asociado a la visita
        //TODO Colocar una validacion tambien para que no pueda eliminarse la visita cuando ya se haya usado el qr para ingresar
        $visita->delete();
        $this->esVisible = false;
        //! Quitar
        //! Para que al eliminar la visita se actualice la vista
        $this->visitas = auth()->user()->visitas;
    }
    /* {
        auth()->user()->visitas()->delete();
        $this->esVisible = false;
    } */

    public function ocultaModal()
    {
        $this->esVisible = false;
    }
}
