<?php

namespace App\Livewire\Visitas;

use App\Models\Department;
use App\Models\Visit;
use Livewire\Component;

class EditarVisita extends Component
{

    public $visita;
    public $department;
    public $visit_motive;
    public $visit_date;
    public $start_at;

    protected $rules = [
        'department' => 'required',
        'visit_motive' => 'required',
        'visit_date' => 'required',
        'start_at' => 'required',
    ];

    public function mount()
    {
        $id = request()->query('id');

        $this->visita = Visit::with('department', 'user')->findOrFail($id);
        $this->department = $this->visita->department_id;
        $this->visit_motive = $this->visita->visit_motive;
        //TODO AGREGAR LA FECHA Y HORA DE LA VISITA EN LA MIGRATION
        $this->visit_date = date('Y-m-d', strtotime($this->visita->start_at));
        $this->start_at = date('H:i', strtotime($this->visita->start_at));
    }

    public function render()
    {
        $departments = Department::all();
        return view('livewire.visitas.editar-visita', [
            'departments' => $departments,
        ]);
    }

    public function editarVisita()
    {
        $this->validate();

        $start_at = date('Y-m-d H:i:s', strtotime($this->visit_date . ' ' . $this->start_at));

        $this->visita->update([
            'department_id' => $this->department,
            'visit_motive' => $this->visit_motive,
            'start_at' => $start_at,
            'visit_date' => $this->visit_date,
        ]);
    }
}
