<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group([
    'middleware' => ['auth', 'checkadmin'],
    'prefix'    => 'users'
], function(){

    Route::get('/crearUsuario',[UsersController::class,'create'])->name('users.create'); // Ruta para ver el formulario
    Route::post('/crearUsuario',[UsersController::class,'store'])->name('users.store'); // Ruta para procesar el formulario
    Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index'); // Ruta para ver el index
    Route::get('/search', [UsersController::class, 'search'])->name('users.search');
    Route::get('/show/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.show'); // Ruta para ver el index por {id} para actualizar
    Route::get('/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit'); // Ruta para ver el formulario para actualizar por {id}
    Route::put('/update/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update'); // Ruta para actualizar el formulario
    Route::delete('/destroy/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy'); // Ruta para borrar el registro del usuario
});





// Route::group([
//     'middleware' => ['auth', 'admin'],
//     'prefix' => 'admin',
//     'namespace' => 'App\Http\Controllers\Admin',
   
// ], function(){
//     Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
//     Route::resource('users', App\Http\Controllers\Admin\UsersController::class);
//     Route::resource('roles', App\Http\Controllers\Admin\RolesController::class);
//     Route::resource('permissions', App\Http\Controllers\Admin\PermissionsController::class);
//     Route::resource('courses', App\Http\Controllers\Admin\CoursesController::class);
//     Route::resource('categories', App\Http\Controllers\Admin\CategoriesController::class);
//     });


//  Route::group([
//     'prefix' => 'teacher',
//    'middleware' => ['auth', 'teacher'],
//     'namespace' => 'App\Http\Controllers\Teacher',
//     'as' => 'teacher.',

//  ], function(){
//     Route::get('/', [App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('dashboard');
//     Route::resource('courses', App\Http\Controllers\Teacher\CoursesController::class);
//     Route::resource('topics', App\Http\Controllers\Teacher\TopicsController::class);
//     Route::resource('assignments', App\Http\Controllers\Teacher\AssignmentsController::class);
//     Route::resource('students', App\Http\Controllers\Teacher\StudentsController::class);
//     Route::resource('exams', App\Http\Controllers\Teacher\ExamsController::class);
//     Route::resource('reports', App\Http\Controllers\Teacher\ReportsController::class);
//     Route::resource('quizzes', App\Http\Controllers\Teacher\QuizzesController::class);
//     Route::resource('quizzes_results', App\Http\Controllers\Teacher\QuizzesResultsController::class);
//  }
// );

// Route::group([
//     'prefix' =>'student',
//    'middleware' => ['auth','student'],
//     'namespace' => 'App\Http\Controllers\Student',
//     'as' =>'student.',
// ], function(){
//     Route::get('/', [App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');
//     Route::resource('courses', App\Http\Controllers\Student\CoursesController::class);
//     Route::resource('topics', App\Http\Controllers\Student\TopicsController::class);
//     Route::resource('assignments', App\Http\Controllers\Student\AssignmentsController::class);
//     Route::resource('exams', App\Http\Controllers\Student\ExamsController::class);
//     Route::resource('reports', App\Http\Controllers\Student\ReportsController::class);
//     Route::resource('quizzes', App\Http\Controllers\Student\QuizzesController::class);
//     Route::resource('quizzes_results', App\Http\Controllers\Student\QuizzesResultsController::class);
// });


//  ----------------------------------------------------------------
// Route::group([
//     'prefix' => 'courses',
//     'namespace' => 'App\Http\Controllers',
//    'middleware' => ['auth', 'administrador'],
// ],function(){
//Route::get('/crearCurso',[App\Http\Controllers\CursosController::class,'create'])->name('crearCurso');
//Route::post('/store',[App\Http\Controllers\CursosController::class,'store'])->name('storeCurso');
// });

//  ----------------------------------------------------------------    

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);