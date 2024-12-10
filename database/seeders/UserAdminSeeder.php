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
            'apellido' => 'admin',  
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => 'password123', 
            'remember_token' => Str::random(10),
            'rol' => 'administrador',  
            'foto_perfil' => null,  
            'biografia' => 'Una biografía del administrador', 
        ]);
    }
}
