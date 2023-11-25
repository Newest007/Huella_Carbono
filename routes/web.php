<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DatosController;
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

//  -------------------- Rol de Admin General --------------------------------

// GESTIONAR USUARIOS
Route::resource('usuarios', UsuariosController::class)->middleware('auth');
Route::get('AñadirUsuarios', [UsuariosController::class,'create'])->middleware('auth');
Route::get('VerUsuarios', [UsuariosController::class,'index'])->middleware('auth');

Route::post('/usuarios',[UsuariosController::class,'store'])->name('usuarios.store')->middleware('auth');
Route::delete('/usuarios/{id_usuario}',[UsuariosController::class,'destroy'])->name('usuarios.destroy')->middleware('auth');


//GESTIONAR DATOS
Route::resource('datos', DatosController::class)->middleware('auth');

Route::get('VerDatosAgua',[DatosController::class,'showAgua'])->middleware('auth');
Route::get('VerDatosDiesel',[DatosController::class,'showDiesel'])->middleware('auth');
Route::get('VerDatosEnergia',[DatosController::class,'showEnergia'])->middleware('auth');
Route::get('VerDatosGas',[DatosController::class,'showGas'])->middleware('auth');
Route::get('VerDatosPapel',[DatosController::class,'showPapel'])->middleware('auth');

Route::view('VerGraficas','GestionarDatos.index')->middleware('auth');
Route::view('AñadirDatos','GestionarDatos.añadirDatos')->middleware('auth');

Route::post('/datosAgua',[DatosController::class,'storeAgua'])->name('datos.storeAgua')->middleware('auth');
Route::post('/datosDiesel',[DatosController::class,'storeDiesel'])->name('datos.storeDiesel')->middleware('auth');
Route::post('/datosEnergia',[DatosController::class,'storeEnergia'])->name('datos.storeEnergia')->middleware('auth');
Route::post('/datosGasolina',[DatosController::class,'storeGasolina'])->name('datos.storeGasolina')->middleware('auth');
Route::post('/datosPapel',[DatosController::class,'storePapel'])->name('datos.storePapel')->middleware('auth');

//GESTIONAR INVENTARIO
Route::view('VerInventario','GestionarInventarios.verInventarios')->middleware('auth');
Route::view('AñadirInventario','GestionarInventarios.añadirInventarios')->middleware('auth');


//  -------------------- Rol de Admin Colegio --------------------------------

// GESTIONAR DATOS
Route::view('indexColegio','GestionarDatos.indexColegio')->middleware('auth'); //No permite acceder a la vista hasta que no inicie sesión
Route::view('VerGraficasColegio','GestionarDatos.indexColegio')->middleware('auth');
Route::view('VerDatosColegio','GestionarDatos.verDatosColegio')->middleware('auth');
Route::view('AñadirDatosColegio','GestionarDatos.añadirDatosColegio')->middleware('auth');

//GESTIONAR INVENTARIO
Route::view('VerInventarioColegio','GestionarInventarios.verInventariosColegio')->middleware('auth');
Route::view('AñadirInventarioColegio','GestionarInventarios.añadirInventariosColegio')->middleware('auth');


Route::view('verDefault','layouts.defaultpage')->middleware('auth');
Route::view('verColegio','GestionarDatos.indexColegio')->middleware('auth');


Route::get('/logout',[LoginController::class,'logout'])->name('logout');