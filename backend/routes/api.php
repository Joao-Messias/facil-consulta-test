<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rotas públicas, não requerem autenticação
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/cidades', [\App\Http\Controllers\CidadeController::class, 'index']);
Route::get('/medicos', [\App\Http\Controllers\MedicoController::class, 'index']);
Route::get('/cidades/{id_cidade}/medicos', [\App\Http\Controllers\MedicoCidadeController::class, 'buscaMedicosPorCidade']);

// Grupo de rotas protegidas com autenticação JWT
Route::group(['middleware' => 'jwt.auth'], function () {
    // Rota para retornar os dados do usuário autenticado
    Route::get('/user', [\App\Http\Controllers\AuthController::class, 'user']);

    // Rotas para médico e paciente
    Route::get('/medicos/{id_medico}/pacientes', [\App\Http\Controllers\MedicoPacienteController::class, 'index']);
    Route::post('/medicos/{id_medico}/pacientes', [\App\Http\Controllers\MedicoPacienteController::class, 'vincularPaciente']);
    Route::post('/medicos', [\App\Http\Controllers\MedicoController::class, 'store']);
    Route::post('/pacientes', [\App\Http\Controllers\PacienteController::class, 'store']);
    Route::put('/pacientes/{id_paciente}', [\App\Http\Controllers\PacienteController::class, 'update']);
});
