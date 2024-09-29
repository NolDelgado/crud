<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    //! En hidden se colocan los campos que no se quieren mostrar en las respuestas
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
