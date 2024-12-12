<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Curso;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       
         // Crear un curso de prueba
         Curso::factory()->create([
            'titulo' => 'Curso de Ejemplo', 
            'institucion' => 'Institución Ejemplo',
            'duracion' => '6 meses',
            'certificados' => 'Sí',
            'precio' => 1000,
            'video_url' => 'https://ejemplo.com',
            'categoria_id' => 1, //  ID de categoría sea válido
        ]);
    }
}
