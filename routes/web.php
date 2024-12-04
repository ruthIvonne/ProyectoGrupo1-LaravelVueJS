<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crearUsuario',[App\Http\Controllers\UsersController::class,'create'])->name('crearUsuario');
Route::post('/store',[App\Http\Controllers\UsersController::class,'store'])->name('storeUsuario');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
