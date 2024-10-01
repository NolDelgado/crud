<?php

namespace App\Livewire\Visitas;

use App\Models\Department;
use App\Models\QrCode;
use App\Models\Visit;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

// TODO: DOCUMENTAR CREACION Y MODIFICACION DE REGISTRAR VISITAS
class RegistrarVisita extends Component
{
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

    public function render()
    {
        //! Debemos de traer los departamentos para poder mostrarlos en el select
        $departments = Department::all();

        return view('livewire.visitas.registrar-visita', [
            'departments' => $departments,
        ]);
    }

    public function registrarVisita()
    {
        $this->validate();

        $start_at = date('Y-m-d H:i:s', strtotime($this->visit_date . ' ' . $this->start_at));

        //! Usar visit_date y start_at para crear la fecha de expiración del código QR, agregar 30 minutos
        $end_at = date('Y-m-d H:i:s', strtotime($this->visit_date . ' ' . $this->start_at) + 1800);

        //dd($this->department, $this->visit_motive, $this->start_at, $end_at, $start_at, auth()->user()->id);

        $visit = Visit::create([
            'user_id' => auth()->user()->id,
            'department_id' => $this->department,
            'visit_motive' => $this->visit_motive,
        ]);

        $user = auth()->user()->id;

        $data = [
            'department' => $this->department,
            'user' => $user,
            'start_at' => $start_at,
            'end_at' => $end_at,
        ];

        /* $this->department . '|' .
            $user . '|' .
            $start_at . '|' .
            $end_at; */

        $token = json_encode($data);
        $encrypted_token = encrypt($token);

        //$decrypted_token = decrypt($encrypted_token);
        //! Hash::make($data);

        //dd($token, $encrypted_token, $decrypted_token);

        QrCode::create([
            'token' => $encrypted_token,
            'visit_id' => $visit->id,
            'start_at' => $start_at,
            'expires_at' => $end_at,
        ]);
    }
}
