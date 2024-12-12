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

//Route::get('/', [CursoController::class, 'index'])->name('cursos.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Rutas para Administradores
Route::group([
    'middleware' => ['auth', 'checkadmin'],
    'prefix'    => 'users'
], function(){
    Route::get('/crearUsuario',[UsersController::class,'create'])->name('users.create');
    Route::post('/crearUsuario',[UsersController::class,'store'])->name('users.store');
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/search', [UsersController::class, 'search'])->name('users.search');
    Route::get('/show/{id}', [UsersController::class, 'edit'])->name('users.show');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});

Route::group([
    'middleware' => ['auth', 'checkadmin'],
    'prefix' => 'cursos',
], function () {
    Route::get('/', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('/crear', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('/crear', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('/editar/{id}', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('/editar/{id}', [CursoController::class, 'update'])->name('cursos.update');
    Route::delete('/eliminar/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy');
});

Route::group([
    'middleware' => ['auth', 'checkadmin'],
    'prefix' => 'categorias'
], function () {
    Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/crear', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/crear', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/editar/{id}', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/editar/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/eliminar/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
});

// Rutas para Docentes
Route::group([
    'middleware' => ['auth', 'checkdocente'],
    'prefix' => 'docentes'
], function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
});

Route::group([
    'middleware' => ['auth', 'checkdocente'],
    'prefix' => 'docentes'
], function () {
    Route::get('/', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('/cursosAsignados', [CursoController::class, 'cursos.asignados'])->name('docentes.cursos_asignados');
});

// Rutas para Alumnos
Route::group([
    'middleware' => ['auth', 'checkalumno'],
    'prefix' => 'alumnos'
], function () {
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    
});

Route::group([
    'middleware' => ['auth', 'checkalumno'],
    'prefix' => 'alumnos'
], function () {
    Route::get('/cursos-alumnos', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('/cursos-comprados', [CursoController::class, 'cursos.comprados'])->name('alumnos.cursos_comprados');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
