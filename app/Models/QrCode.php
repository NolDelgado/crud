<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//TODO AGREGAR AL FORMATO DE CREACION DE MODELOS DE CODIGOS QR
//TODO AGREGAR MODIFICACION DE MODELO

class QrCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'visit_id',
        'start_at',
        'expires_at',
    ];

    protected $casts = [
        'token' => 'string',
        'visit_id' => 'integer',
        'start_at' => 'datetime:Y-m-d H:i:s',
        'expires_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //TODO DOCUMENTAR CREACION DE RELACIONES DE MODELOS DE CODIGOS QR
    //! Un codigo QR pertenece a una visita
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
