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
Route::view('index','layouts.template')->middleware('auth'); //No permite acceder a la vista hasta que no inicie sesión
Route::view('añadir','GestionarUsuarios.index')->middleware('auth');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');