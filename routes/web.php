<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\DatosControllerUser;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\Cole_ReporteController;

use App\Http\Controllers\Auth;

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

Route::view('AñadirDatos','GestionarDatos.añadirDatos')->middleware('auth');

Route::get('VerDatosAgua',[DatosController::class,'showAgua'])->middleware('auth');
Route::get('VerDatosDiesel',[DatosController::class,'showDiesel'])->middleware('auth');
Route::get('VerDatosEnergia',[DatosController::class,'showEnergia'])->middleware('auth');
Route::get('VerDatosGas',[DatosController::class,'showGas'])->middleware('auth');
Route::get('VerDatosPapel',[DatosController::class,'showPapel'])->middleware('auth');


Route::get('GenerarReporte',[ReporteController::class,'index'])->middleware('auth');

Route::post('/datosAgua',[DatosController::class,'storeAgua'])->name('datos.storeAgua')->middleware('auth');
Route::post('/datosDiesel',[DatosController::class,'storeDiesel'])->name('datos.storeDiesel')->middleware('auth');
Route::post('/datosEnergia',[DatosController::class,'storeEnergia'])->name('datos.storeEnergia')->middleware('auth');
Route::post('/datosGasolina',[DatosController::class,'storeGasolina'])->name('datos.storeGasolina')->middleware('auth');
Route::post('/datosPapel',[DatosController::class,'storePapel'])->name('datos.storePapel')->middleware('auth');

Route::get('datosSC',[DatosController::class,'indexSC'])->middleware('auth');
Route::get('datosSJ',[DatosController::class,'indexSJ'])->middleware('auth');
Route::get('datosMA',[DatosController::class,'indexMA'])->middleware('auth');

Route::post('/mostrarGraficaDB',[DatosController::class,'mostrarGraficaDB'])->name('datos.mostrarGraficaDB')->middleware('auth');
Route::post('/mostrarGraficaSC',[DatosController::class,'mostrarGraficaSC'])->name('datos.mostrarGraficaSC')->middleware('auth');
Route::post('/mostrarGraficaSJ',[DatosController::class,'mostrarGraficaSJ'])->name('datos.mostrarGraficaSJ')->middleware('auth');
Route::post('/mostrarGraficaMA',[DatosController::class,'mostrarGraficaMA'])->name('datos.mostrarGraficaMA')->middleware('auth');

//PDF → ADMIN GENERAL
Route::post('pdf_mes',[ReporteController::class,'pdf_anio_mes'])->middleware('auth');
Route::post('pdf_anio',[ReporteController::class,'pdf_anio'])->middleware('auth');

//ELIMINAR REGISTROS
Route::delete('/datosAgua/{id_colegio}/{id_Anio}/{Mes}',[DatosController::class,'destroyAgua'])->name('datosAgua.destroy')->middleware('auth');
Route::delete('/datosDiesel/{id_colegio}/{id_Anio}/{Mes}',[DatosController::class,'destroyDiesel'])->name('datosDiesel.destroy')->middleware('auth');
Route::delete('/datosEnergia/{id_colegio}/{id_Anio}/{Mes}',[DatosController::class,'destroyEnergia'])->name('datosEnergia.destroy')->middleware('auth');
Route::delete('/datosGas/{id_colegio}/{id_Anio}/{Mes}',[DatosController::class,'destroyGas'])->name('datosGas.destroy')->middleware('auth');
Route::delete('/datosPapel/{id_colegio}/{id_Anio}/{Mes}',[DatosController::class,'destroyPapel'])->name('datosPapel.destroy')->middleware('auth');


//GESTIONAR INVENTARIO
Route::view('VerInventario','GestionarInventarios.verInventarios')->middleware('auth');
Route::view('AñadirInventario','GestionarInventarios.añadirInventarios')->middleware('auth');


//  -------------------- Rol de Admin Colegio --------------------------------

// GESTIONAR DATOS
Route::resource('datosC', DatosControllerUser::class)->middleware('auth');

Route::get('VerDatosAguaC',[DatosControllerUser::class,'showAguaC'])->middleware('auth');
Route::get('VerDatosDieselC',[DatosControllerUser::class,'showDieselC'])->middleware('auth');
Route::get('VerDatosEnergiaC',[DatosControllerUser::class,'showEnergiaC'])->middleware('auth');
Route::get('VerDatosGasC',[DatosControllerUser::class,'showGasC'])->middleware('auth');
Route::get('VerDatosPapelC',[DatosControllerUser::class,'showPapelC'])->middleware('auth');

//Route::view('VerGraficasC','GestionarDatos.indexColegio')->middleware('auth');
Route::post('/mostrarGrafica',[DatosControllerUser::class,'mostrarGrafica'])->name('datosC.mostrarGrafica')->middleware('auth');
Route::view('AñadirDatosC','GestionarDatos.añadirDatosColegio')->middleware('auth');

Route::post('/datosAguaC',[DatosControllerUser::class,'storeAgua'])->name('datosC.storeAgua')->middleware('auth');
Route::post('/datosDieselC',[DatosControllerUser::class,'storeDiesel'])->name('datosC.storeDiesel')->middleware('auth');
Route::post('/datosEnergiaC',[DatosControllerUser::class,'storeEnergia'])->name('datosC.storeEnergia')->middleware('auth');
Route::post('/datosGasolinaC',[DatosControllerUser::class,'storeGasolina'])->name('datosC.storeGasolina')->middleware('auth');
Route::post('/datosPapelC',[DatosControllerUser::class,'storePapel'])->name('datosC.storePapel')->middleware('auth');

Route::view('GenerarReporteC','GestionarDatos.reportes.reportes22C')->middleware('auth');
Route::view('GenerarReporteTresC','GestionarDatos.reportes.reportes23C')->middleware('auth');
Route::view('GenerarReporteCuatroC','GestionarDatos.reportes.reportes24C')->middleware('auth');
Route::view('GenerarReporteCincoC','GestionarDatos.reportes.reportes25C')->middleware('auth');


//ELIMINAR REGISTROS
Route::delete('/datosAguaC/{id_colegio}/{id_Anio}/{Mes}',[DatosControllerUser::class,'destroyAgua'])->name('datosAguaC.destroy')->middleware('auth');
Route::delete('/datosDieselC/{id_colegio}/{id_Anio}/{Mes}',[DatosControllerUser::class,'destroyDiesel'])->name('datosDieselC.destroy')->middleware('auth');
Route::delete('/datosEnergiaC/{id_colegio}/{id_Anio}/{Mes}',[DatosControllerUser::class,'destroyEnergia'])->name('datosEnergiaC.destroy')->middleware('auth');
Route::delete('/datosGasC/{id_colegio}/{id_Anio}/{Mes}',[DatosControllerUser::class,'destroyGas'])->name('datosGasC.destroy')->middleware('auth');
Route::delete('/datosPapelC/{id_colegio}/{id_Anio}/{Mes}',[DatosControllerUser::class,'destroyPapel'])->name('datosPapelC.destroy')->middleware('auth');


//GESTIONAR INVENTARIO
Route::view('VerInventarioC','GestionarInventarios.verInventariosColegio')->middleware('auth');
Route::view('AñadirInventarioC','GestionarInventarios.añadirInventariosColegio')->middleware('auth');

//GENERAR REPORTE
//PDF → ADMIN Cole
Route::post('pdf_mes_c',[Cole_ReporteController::class,'pdf_anio_mes'])->middleware('auth');
Route::post('pdf_anio_c',[Cole_ReporteController::class,'pdf_anio'])->middleware('auth');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');