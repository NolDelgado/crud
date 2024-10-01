<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//TODO AGREGAR AL FORMATO DE CREACION DE MODELOS DE DEPARTAMENTOS
//TODO AGREGAR MODIFICACION DE CAMPOS DE MODELOS DE DEPARTAMENTOS SE AGREGARON LOS CAMPOS START_HOUR Y END_HOUR

class Department extends Model
{
    use HasFactory;

    //! En fillable se colocan los campos que se pueden llenar de forma masiva
    protected $fillable = [
        'user_id',
        'department_name',
        'description',
    ];

    //! En casts se colocan los campos que se quieren castear a un tipo de dato en especifico
    protected $casts = [
        'user_id' => 'integer',
        'department_name' => 'string',
        'description' => 'string',
        'start_hour' => 'datetime:H:i:s', // Aquí se especifica que será una fecha y hora con formato de horas
        'end_hour' => 'datetime:H:i:s',
    ];

    //! En hidden se colocan los campos que no se quieren mostrar en las respuestas
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //TODO AGREGAR AL FORMATO DE CREACION DE RELACIONES DE MODELOS DE DEPARTAMENTOS

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //TODO DOCUMENTAR CREACION DE RELACIONES DE MODELOS DE DEPARTAMENTOS
    //! Un departamento tiene muchas visitas
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
