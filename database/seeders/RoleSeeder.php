<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

//TODO AGREGAR AL FORMATO DE CREACION DEL SEEDER DE ROLES
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Visitante',
            'Alumno',
            'Admin',
            'Jefe de departamento',
            'Vigilante'
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
