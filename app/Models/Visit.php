<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//TODO AGREGAR AL FORMATO DE CREACION DE MODELOS DE VISITAS
//TODO AGREGAR MODIFICACION DE MODELO DE VISITAS

class Visit extends Model
{
    use HasFactory;

    //! En fillable se colocan los campos que se pueden llenar de forma masiva
    protected $fillable = [
        'user_id',
        'department_id',
        //TODO DOCUMENTAR MODIFICACION DE MODELO DE VISITAS
        'visit_motive',
    ];

    //TODO DOCUMENTAR CREACION DE RELACIONES DE MODELOS DE VISITAS
    //! Una visita pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //TODO DOCUMENTAR CREACION DE RELACIONES DE MODELOS DE VISITAS
    //! Una visita pertenece a un departamento
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    //TODO DOCUMENTAR CREACION DE RELACIONES DE MODELOS DE VISITAS\
    //! Una visita tiene un codigo QR
    public function qrCode()
    {
        return $this->hasOne(QrCode::class);
    }
}
