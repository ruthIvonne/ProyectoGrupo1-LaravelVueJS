<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria; 
use App\Models\Curso; 
use Illuminate\Database\Seeder;
use Database\Seeders\CursoUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // $this->call(UserAdminSeeder::class);

        User::factory(10)->create();

        Categoria::factory(10)->create();

        Curso::factory(10)->create();

        $this->call(CursoUserSeeder::class);

      //  $this->call(RoleAndPermissionSeeder::class);
        
    }
}
