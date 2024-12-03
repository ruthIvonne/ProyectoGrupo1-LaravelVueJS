<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crearUsuario',[App\Http\Controllers\UsersController::class,'create'])->name('crearUsuario');
Route::post('/store',[App\Http\Controllers\UsersController::class,'store'])->name('storeUsuario');