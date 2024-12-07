<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria; // Importar la clase Categoria
use App\Models\Curso; // Importar la clase Curso
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar al UserAdminSeeder para crear el usuario admin
        $this->call(UserAdminSeeder::class);

        // Llamar al seeder de usuarios regulares
        \App\Models\User::factory(10)->create();

        // Crear 10 categorías de prueba
        Categoria::factory(10)->create();

        // Crear 10 cursos de prueba, cada uno asociado a una categoría
        Curso::factory(10)->create();

        // Llamar al seeder de roles y permisos si es necesario
        // $this->call(RoleAndPermissionSeeder::class);
        // Llamar al seeder de cursos si es necesario
        // $this->call(CursosSeeder::class);
    }
}
