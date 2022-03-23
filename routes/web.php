<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TecnicosController;
use App\Http\Controllers\ClientesController;


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
Route::get('Eliminar-Tecnico/{id}', [TecnicosController::class, 'destroy']);

Route::get('Clientes', [ClientesController::class, 'index']);
Route::get('Crear-Cliente', [ClientesController::class, 'create']);
Route::post('Crear-Cliente', [ClientesController::class, 'store']);
Route::get('Editar-Cliente/{id}', [ClientesController::class, 'edit']);
Route::put('actualizar-cliente/{cliente}', [ClientesController::class, 'update']);
Route::get('Eliminar-Cliente/{id}', [ClientesController::class, 'destroy']);