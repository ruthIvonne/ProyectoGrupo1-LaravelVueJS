<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoUserSeeder extends Seeder
{
    public function run()
{
    // Obtener todos los usuarios
    $users = User::all();

    // Iterar sobre cada usuario
    foreach ($users as $user) {
        // Seleccionar 3 cursos aleatorios para cada usuario
        $cursos = Curso::inRandomOrder()->take(3)->get();

        // Asociar estos cursos al usuario
        foreach ($cursos as $curso) {
            $user->cursosComprados()->attach($curso);
        }
    }
}
}