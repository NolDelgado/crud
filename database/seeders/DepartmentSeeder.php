<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\User;

//TODO AGREGAR AL FORMATO DE CREACION DEL SEEDER DE DEPARTAMENTOS
//TODO AGREGAR AL FORMATO DE MODIFICACION DEL SEEDER DE DEPARTAMENTOS

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['user_id' => 1, 'department_name' => 'Coordinacion General', 'description' => 'Dr. Martín Carlos Vera Estrada', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 2, 'department_name' => 'Departamento Académico', 'description' => 'Mtra. Elizabeth Ramírez Fuentes', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 3, 'department_name' => 'Departamento Administrativo', 'description' => 'C.P. José Gil Palma', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 4, 'department_name' => 'Unidad de Recursos Financieros', 'description' => 'José A. Martínez Sánchez', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 5, 'department_name' => 'Unidad de Control Escolar', 'description' => 'Ing. Cristina Valencia Camacho', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 6, 'department_name' => 'Unidad de Planeación', 'description' => 'Dr. Amador Huitrón Contreras', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 7, 'department_name' => 'Unidad de Recursos Humanos', 'description' => 'Sandra Yesenia Granados González', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 8, 'department_name' => 'Unidad de Evaluación Profesional', 'description' => 'L. Yamel Vega Enríquez', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 9, 'department_name' => 'Unidad de Docencia de la Lic. en Seguridad Ciudadana', 'description' => 'Mtro. Praxedis Bernal Espinosa', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 10, 'department_name' => 'Unidad de Docencia de la Lic. de Ingeniería en Software', 'description' => 'Dr. Gerardo Ávila Vilchis', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 11, 'department_name' => 'Unidad de Docencia de la Lic. de Ingeniería en Producción Industrial', 'description' => 'Dr. Rodrigo Mendoza Frías', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 12, 'department_name' => 'Unidad de Docencia de la Lic. de Ingeniería en Plásticos', 'description' => 'M. en Ing. Raymundo Medina Negrete', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 13, 'department_name' => 'Unidad de Docencia de la Lic. de Ingeniería Mecánica', 'description' => 'Dra. Mariana Morales Benhumea', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 14, 'department_name' => 'Unidad de Docencia de la Lic. de Ingeniería en Computación', 'description' => 'Dra. Nely Plata Cesar', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 15, 'department_name' => 'Departamento de Estudios Avanzados', 'description' => 'Dr. Carlos Juárez Toledo', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 16, 'department_name' => 'Coordinacion de Maestría en Ciencias Computacionales', 'description' => 'Dr. René A. García Hernández', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 17, 'department_name' => 'Coordinacion de Doctorado en Ciencias Computacionales', 'description' => 'Dra. Yulia Nikolaevna Ledeneva', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 18, 'department_name' => 'Departamento de Extensión y Vinculación', 'description' => 'Dra. Adriana Fonseca Munguía', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 19, 'department_name' => 'Unidad de Atención y Seguimiento a Tutorias', 'description' => 'Dr. David Valle Cruz', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 20, 'department_name' => 'Departamento de Investigación', 'description' => 'Dr. Ángel Gabriel Estévez Pedraza', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 21, 'department_name' => 'Unidad de Servicio Social', 'description' => 'M. Christian Ruiz Ugalde', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 22, 'department_name' => 'Unidad de Inglés', 'description' => 'L. Iris Hernández Zúñiga', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 23, 'department_name' => 'Coordinacion de Biblioteca', 'description' => 'M. Martín García Ávila', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 24, 'department_name' => 'Unidad de Tecnologías de la Información y Comunicaciones', 'description' => 'L.A Berenice López Díaz', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 25, 'department_name' => 'Unidad de Educación Continua y a Distancia', 'description' => 'M. Emilio Tovar Pérez', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 26, 'department_name' => 'Laboratorios', 'description' => 'Dr. José Luís Tapia Fabela', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 27, 'department_name' => 'Promoción deportiva', 'description' => 'Mtro. Omar Beltrán Amero', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 28, 'department_name' => 'Cronista', 'description' => 'Dra. Ana Lilia Flores Vázquez', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 29, 'department_name' => 'Secretaria de Coordinación General', 'description' => 'L. Karol Moreno Villa', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
            ['user_id' => 30, 'department_name' => 'Secretaría del Departamento Académico', 'description' => 'L. Laura Romero Carmona', 'start_hour' => '08:00:00', 'end_hour' => '16:00:00'],
        ];

        foreach ($departments as $department) {
            // Asignar un user_id aleatorio
            //! $department['user_id'] = User::inRandomOrder()->first()->id;
            Department::create($department);
        }
    }
}
