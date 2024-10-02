<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validaciones basadas en el tipo de usuario
        $rules = [
            'name' => ['required', 'string', 'max:255'], // El nombre es requerido para todos los tipos de usuario
            'email' => ['required', 'email', 'max:255', 'unique:users,email'], // El email es requerido en todos los casos
            'password' => $this->passwordRules(),
            'phone' => ['required', 'string', 'max:15'], // Teléfono requerido para todos los tipos de usuario
            'user_type' => ['required', 'in:student,teacher,guest'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ];

        if ($input['user_type'] === 'student') {
            // Validación adicional para estudiantes
            $rules['career'] = ['required', 'string', 'max:255'];
            $rules['semester'] = ['required', 'string', 'max:10'];
            $rules['tuition'] = ['required', 'string', 'max:20'];
        }

        Validator::make($input, $rules)->validate();

        // Asignación de la vigencia (validity) solo para estudiantes y maestros
        $validity = null;
        if ($input['user_type'] !== 'guest') {
            $currentMonth = Carbon::now()->month;
            $currentYear = Carbon::now()->year;

            if ($currentMonth >= 2 && $currentMonth <= 7) {
                $validity = Carbon::createFromDate($currentYear, 8, 31);
            } else {
                $validity = Carbon::createFromDate($currentYear + 1, 2, Carbon::createFromDate($currentYear + 1, 2, 1)->isLeapYear() ? 29 : 28);
            }
        }

        // Generación automática de fcm_code para todos los tipos de usuario
        $fcm_code = bin2hex(random_bytes(10));

        // Crear el usuario basado en el tipo
        return User::create([
            'name' => $input['name'], // El nombre es requerido para todos
            'email' => $input['email'], // Email requerido en todos los casos
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'], // El teléfono es requerido para todos
            'fcm_code' => $fcm_code, // Se asigna automáticamente
            'career' => $input['user_type'] === 'student' ? $input['career'] : null, // Solo para estudiantes
            'semester' => $input['user_type'] === 'student' ? $input['semester'] : null, // Solo para estudiantes
            'tuition' => $input['user_type'] === 'student' ? $input['tuition'] : null, // Solo para estudiantes
            'validity' => $validity, // Vigencia basada en el ciclo semestral para estudiantes y maestros
            'user_type' => $input['user_type'], // Tipo de usuario (estudiante, maestro o externo/invitado)
        ]);
    }
}
