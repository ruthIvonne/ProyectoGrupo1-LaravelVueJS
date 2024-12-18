<?php

use App\Http\Controllers\Api\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) 
{
    return $request->user();
});

/* Route::get('comments','Api\CommentController@index');  */
Route::apiResource('comments',Api\CommentController::class);


//Rutas de Cursos
//Route::resource('courses', CourseController::class)->only('store','show','index','destroy','update');
//Route::apiResource('courses', CourseController::class);
Route::prefix('Cursos')->group(function () {
    Route::get('/', [CourseController::class, 'index']); // Obtener lista de productos
    Route::post('/', [CourseController::class, 'store']); // Crear un producto
    Route::get('/{id}', [CourseController::class, 'show']); // Mostrar un producto
    Route::put('/update/{id}', [CourseController::class, 'update'])->name('Cursos.update');
    Route::delete('/{id}', [CourseController::class, 'destroy']); // Eliminar un producto
});
Route::prefix('Cart')->group(function () {
    Route::get('/', [CourseController::class, 'cart']); // Obtener lista de productos
 
});
Route::get('/cursos', [CursoController::class, 'index']);
Route::get('/cursos/{id}/toggle-estado', [CursoController::class, 'toggleEstado']);
