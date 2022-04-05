<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TecnicosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\SecretariasController;


Route::get('/', function () {
    return view('modulos.Seleccionar');
});
Route::get('/Ingresar', function () {
    return view('modulos.Ingresar');
});


Auth::routes();

Route::get('Inicio', [InicioController::class, 'index']);
Route::get('Mis-Datos', [InicioController::class, 'DatosCreate']);
Route::put('Mis-Datos', [InicioController::class, 'DatosUpdate']);


Route::get('Servicios', [ServiciosController::class, 'index']);
Route::post('Servicios', [ServiciosController::class, 'store']);
Route::put('Servicio/{id}', [ServiciosController::class, 'update']);
Route::delete('borrar-Servicio/{id}', [ServiciosController::class, 'destroy']);

//Ver Servicios como Cliente 

Route::get('Ver-Servicios', [ServiciosController::class, 'verServicios']);





Route::get('Tecnicos', [TecnicosController::class, 'index']);
Route::post('Tecnicos', [TecnicosController::class, 'store']);
Route::get('Eliminar-Tecnico/{id}', [TecnicosController::class, 'destroy']);


//Ver tecnicos  como Cliente 

Route::get('Ver-Tecnicos/{id}', [TecnicosController::class, 'VerTecnicos']);



Route::get('Clientes', [ClientesController::class, 'index']);
Route::get('Crear-Cliente', [ClientesController::class, 'create']);
Route::post('Crear-Cliente', [ClientesController::class, 'store']);
Route::get('Editar-Cliente/{id}', [ClientesController::class, 'edit']);
Route::put('actualizar-cliente/{cliente}', [ClientesController::class, 'update']);
Route::get('Eliminar-Cliente/{id}', [ClientesController::class, 'destroy']);


Route::get('Citas/{id}', [CitasController::class, 'index']);
Route::post('Horario', [CitasController::class, 'HorarioTecnico']);
Route::put('editar-horario/{id}', [CitasController::class, 'EditarHorario']);
Route::post('Citas/{id_tecnico}', [CitasController::class, 'CrearCita']);
Route::delete('borrar-cita', [CitasController::class, 'destroy']);


//Historial de Citas Paciente

Route::get('Historial', [CitasController::class, 'historial']);



Route::get('Secretarias', [SecretariasController::class, 'index']);
Route::post('Secretarias', [SecretariasController::class, 'store']);
Route::get('Eliminar-Secretaria/{id}', [SecretariasController::class, 'destroy']);
Route::get('Editar-Secretaria/{id}', [SecretariasController::class, 'show']);
Route::put('actualizar-secretaria/{id}', [SecretariasController::class, 'update']);




