<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;


use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Rutas para Administradores
Route::group([
  //  'middleware' => ['auth', 'checkadmin'],
    'prefix'    => 'users'
], function(){
    Route::get('/crearUsuario',[UsersController::class,'create'])->name('users.create')->middleware('checkadmin');
    Route::post('/crearUsuario',[UsersController::class,'store'])->name('users.store')->middleware('checkadmin');
    Route::get('/', [UsersController::class, 'index'])->name('users.index')->middleware('role:administrador,docente,alumno');
    Route::get('/show/{id}', [UsersController::class, 'edit'])->name('users.show')->middleware('role:administrador,docente,alumno');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit')->middleware('role:administrador,docente,alumno');
    Route::put('/update/{id}', [UsersController::class, 'update'])->name('users.update')->middleware('role:administrador,docente,alumno');
    Route::delete('/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy')->middleware('checkadmin');
});

Route::group([
    //'middleware' => ['auth', 'checkadmin'],
    'prefix' => 'cursos',
], function () {
    Route::get('/', [CursoController::class, 'index'])->name('cursos.index')->middleware('role:administrador,docente,alumno');
    Route::get('/crear', [CursoController::class, 'create'])->name('cursos.create')->middleware('checkadmin');
    Route::post('/crear', [CursoController::class, 'store'])->name('cursos.store')->middleware('checkadmin');
    Route::get('/editar/{id}', [CursoController::class, 'edit'])->name('cursos.edit')->middleware('checkadmin');
    Route::put('/editar/{id}', [CursoController::class, 'update'])->name('cursos.update')->middleware('checkadmin');
    Route::delete('/eliminar/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy')->middleware('checkadmin');
    Route::get('/cursosAsignados', [CursoController::class, 'asignados'])->name('docentes.cursos_asignados')->middleware('role:administrador,docente');
    Route::get('/cursos-comprados', [CursoController::class, 'comprados'])->name('alumnos.cursos_comprados')->middleware('role:administrador,alumno');
});

Route::group([
    //'middleware' => ['auth', 'checkadmin'],
    'prefix' => 'categorias'
], function () {
    Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index')->middleware('role:administrador,docente,alumno');
    Route::get('/crear', [CategoriaController::class, 'create'])->name('categorias.create')->middleware('checkadmin');
    Route::post('/crear', [CategoriaController::class, 'store'])->name('categorias.store')->middleware('checkadmin');
    Route::get('/editar/{id}', [CategoriaController::class, 'edit'])->name('categorias.edit')->middleware('checkadmin');
    Route::put('/editar/{id}', [CategoriaController::class, 'update'])->name('categorias.update')->middleware('checkadmin');
    Route::delete('/eliminar/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy')->middleware('checkadmin');
});

// Rutas para Docentes
// Route::group([
//     'middleware' => ['auth', 'checkdocente'],
//     'prefix' => 'docentes'
// ], function () {
//     Route::get('/', [UsersController::class, 'index'])->name('users.index');
//     Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
// });

// Route::group([
//     'middleware' => ['auth', 'checkdocente'],
//     'prefix' => 'docentes'
// ], function () {
//     Route::get('/', [CursoController::class, 'index'])->name('cursos.index');
// });

// Rutas para Alumnos
// Route::group([
//     'middleware' => ['auth', 'checkalumno'],
//     'prefix' => 'alumnos'
// ], function () {
//     Route::get('/', [UsersController::class, 'index'])->name('users.index');
//     Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    
// });

// Route::group([
//     'middleware' => ['auth', 'checkalumno'],
//     'prefix' => 'alumnos'
// ], function () {
//     Route::get('/cursos-alumnos', [CursoController::class, 'index'])->name('cursos.index');

// });