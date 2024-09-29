<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //! No descomentar, hasta que se tengan los modelos y las relaciones
        //! RoleSeeder::class;

        $this->call(DepartmentSeeder::class);

        //! Descomentar en caso de que se quieran crear usuarios de prueba
        //! User::factory(25)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
