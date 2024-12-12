<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       

        $roleAdmin = Role::firstOrCreate(['name' => 'administrador']);
        $roleDocente = Role::firstOrCreate(['name' => 'docente']);
        $roleAlumno = Role::firstOrCreate(['name' => 'alumno']);

      

        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.store']);
        Permission::create(['name' => 'users.search']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.update']);
        Permission::create(['name' => 'users.destroy']);

        Permission::create(['name' => 'cursos.index']);
        Permission::create(['name' => 'cursos.create']);
        Permission::create(['name' => 'cursos.store']);
        Permission::create(['name' => 'cursos.search']);
        Permission::create(['name' => 'cursos.edit']);
        Permission::create(['name' => 'cursos.update']);
        Permission::create(['name' => 'cursos.destroy']);

        Permission::create(['name' => 'categorias.index']);
        Permission::create(['name' => 'categorias.create']);
        Permission::create(['name' => 'categorias.store']);
        Permission::create(['name' => 'categorias.search']);
        Permission::create(['name' => 'categorias.edit']);
        Permission::create(['name' => 'categorias.update']);
        Permission::create(['name' => 'categorias.destroy']);
        
        $permissions = Permission::all();

        // $roleAdmin->syncPermissions($permissions);
        // $roleDocente->syncPermissions($permissions);
        // $roleAlumno->syncPermissions($permissions);

        $users = User::all(); 

        foreach ($users as $user) {
            if ($user->rol == 'administrador') {
                $user->assignRole($roleAdmin); 
            } elseif ($user->rol == 'docente') {
                $user->assignRole($roleDocente); 
            } elseif ($user->rol == 'alumno') {
                $user->assignRole($roleAlumno);
            }
        }
    }
}
