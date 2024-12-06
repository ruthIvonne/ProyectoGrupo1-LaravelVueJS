<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        // Llamar al seeder de roles y permisos
       // $this->call(RoleAndPermissionSeeder::class);
        // Llamar al seeder de cursos 
        //$this->call(CursosSeeder::class);
    }
}

