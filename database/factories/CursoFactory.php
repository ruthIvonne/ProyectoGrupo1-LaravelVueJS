<?php

namespace Database\Factories;

use App\Models\Curso;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'titulo' => $this->faker->jobTitle, // Utiliza una título aleatorio para el título del curso
        'institucion' => $this->faker->name, // Utiliza el nombre de una institución aleatoria
        'plan_de_estudio' => $this->faker->text(350), // Utiliza un párrafo aleatorio para el plan de estudio
        'duracion' => $this->faker->time, // Utiliza una hora aleatoria para la duración
        'certificados' => $this->faker->boolean, // Utiliza un valor booleano aleatorio para certificados
        'precio' => $this->faker->randomFloat(2, 100, 1000), // Utiliza un valor decimal aleatorio para el precio
        'video_url' => $this->faker->url, // Utiliza una URL aleatoria para el video
        'user_created' => \App\Models\User::all()->random()->id, // Relaciona con un usuario aleatorio para user_created
        'user_updated' => \App\Models\User::all()->random()->id, // Relaciona con un usuario aleatorio para user_updated
        'categoria_id' => \App\Models\Categoria::all()->random()->id, // Relaciona con una categoría aleatoria
        'docente_id' => \App\Models\User::where('rol', 'docente')->get()->random()->id, // Relaciona con un docente aleatorio
    ];
}
}
