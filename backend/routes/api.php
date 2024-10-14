<?php

use App\Http\Controllers\PacienteController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'paciente'], function () {
    Route::get('/', [PacienteController::class, 'index']); // Para listar todos os pacientes
    Route::post('/', [PacienteController::class, 'store']); // Para criar um novo paciente
    Route::put('/{id}', [PacienteController::class, 'update']); // Para atualizar um paciente existente
    Route::get('/{id}', [PacienteController::class, 'show']); // Para obter um paciente específico pelo ID
    Route::delete('/{id}', [PacienteController::class, 'delete']); // Para deletar um paciente
});