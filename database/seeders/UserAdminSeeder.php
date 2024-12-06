<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'apellido' => 'admin',  // Campo 'apellido' agregado
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => 'password123', // Texto plano; el modelo lo hasheará
            'remember_token' => Str::random(10),
            'rol' => 'administrador',  // Campo 'rol' agregado
            'foto_perfil' => null,  // Se puede dejar como null o poner una URL predeterminada
            'biografia' => 'Una biografía del administrador',  // Campo 'biografia' agregado
        ]);
    }
}
