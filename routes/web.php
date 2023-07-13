<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth;


/*
Route::get('/', function () {
    return view('login');
});*/

Route::get('/prueba', function () {
    return view('layouts.defaultPage');
});


Route::view('/','login')->name('login');
Route::view('login','login')->name('login');

Route::post('login', [LoginController::class, 'store']);

// GESTIONAR USUARIOS
Route::view('index','GestionarDatos.index')->middleware('auth'); //No permite acceder a la vista hasta que no inicie sesión
Route::view('AñadirUsuario','GestionarUsuarios.index')->middleware('auth');
Route::view('VerUsuario','GestionarUsuarios.verUsuario')->middleware('auth');

//GESTIONAR DATOS


//GESTIONAR INVENTARIO
Route::view('VerInventario','GestionarInventarios.verInventarios')->middleware('auth');



Route::view('verDefault','layouts.defaultpage')->middleware('auth');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');