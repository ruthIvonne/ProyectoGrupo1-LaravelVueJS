<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $created_at, $updated_at;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->unique(),
            'institucion' => fake()->name(),
            'plan_de_estudio' => fake()->name(),
            'duracion' => fake()->name(),
            'certificados' => fake()->name(),
            'precio' => fake()->name(),
            'video_url' => fake()->name(),
            'user_created' => fake()->name(),
            'user_update' => fake()->name()
        ];
    }
 
  
    /**
     * 
     */
   
}
