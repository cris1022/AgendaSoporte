<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TecnicosController;



Route::get('/', function () {
    return view('modulos.Seleccionar');
});
Route::get('/Ingresar', function () {
    return view('modulos.Ingresar');
});


Auth::routes();

Route::get('Inicio', [InicioController::class, 'index']);

Route::get('Servicios', [ServiciosController::class, 'index']);
Route::post('Servicios', [ServiciosController::class, 'store']);
Route::put('Servicio/{id}', [ServiciosController::class, 'update']);
Route::delete('borrar-Servicio/{id}', [ServiciosController::class, 'destroy']);



Route::get('Tecnicos', [TecnicosController::class, 'index']);
Route::post('Tecnicos', [TecnicosController::class, 'store']);
