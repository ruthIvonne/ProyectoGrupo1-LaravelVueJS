<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crearUsuario',[App\Http\Controllers\UsersController::class,'create'])->name('crearUsuario');
Route::post('/store',[App\Http\Controllers\UsersController::class,'store'])->name('storeUsuario');

// Rutas Web para la gestión de cursos

Route::prefix('Cursos')->group(function () {
    Route::get('/cursos', [CourseController::class, 'index'])->name('Cursos.index'); // Mostrar Crud de cursos
    Route::get('/cursos/catalogo', [CourseController::class, 'catalogo'])->name('Cursos.catalogo'); // Mostrar la catalogo de cursos
    Route::get('/cursos/create', [CourseController::class, 'create'])->name('Cursos.create'); // Vista Crear curso
    Route::get('/cursos/product', [CourseController::class, 'products'])->name('Cursos.product'); // Crear curso
    Route::post('/', [CourseController::class, 'store'])->name('Cursos.store'); // Guardar curso
    Route::get('/cursos/show/{id}', [CourseController::class, 'show'])->name('Cursos.show'); // Mostrar un curso específico
    Route::delete('cursos/destroy/{id}', [CourseController::class, 'destroy'])->name('Cursos.destroy'); // Eliminar curso
      // Ruta para mostrar la vista de edición (GET)
    Route::get('/cursos/edit/{id}', [CourseController::class, 'update_view'])->name('Cursos.edit');

    // Ruta para actualizar los datos (PUT o PATCH)
    Route::put('/update/{id}', [CourseController::class, 'update'])->name('Cursos.update');
    Route::get('/cursos/{id}/toggle-estado', [CourseController::class, 'toggleEstado'])->name('Cursos.toggleEstado');

});
//Carrito (en proceso)
Route::post('/carrito/agregar/{id}', [CartController::class, 'agregar'])->name('carrito.agregar');
