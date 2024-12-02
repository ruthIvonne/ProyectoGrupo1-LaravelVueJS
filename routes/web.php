<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crearUsuario',[App\Http\Controllers\UsersController::class,'create'])->name('crearUsuario');
Route::get('/store',[App\Http\Controllers\UsersController::class,'store'])->name('storeUsuario');