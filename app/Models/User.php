<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',         // Campo de teléfono
        'fcm_code',      // Campo de código FCM
        'career',        // Campo de carrera
        'semester',      // Campo de semestre
        'tuition',       // Campo de número de cuenta
        'validity',      // Campo de vigencia
        'user_type',     // Campo de tipo de usuario
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'validity' => 'date', // Cast del campo de vigencia como fecha
        ];
    }

    // Relación: Un usuario puede ser jefe de un departamento
    public function department()
    {
        return $this->hasOne(Department::class);
    }

    // Relación: Un usuario puede tener muchas visitas
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}