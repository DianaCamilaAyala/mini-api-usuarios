<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Listar todos los usuarios
Route::get('/usuarios', [UsuarioController::class, 'index']);

// Crear un usuario
Route::post('/usuarios', [UsuarioController::class, 'store']);

// Actualizar un usuario específico (por ID)
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);

// Eliminar un usuario específico (por ID)
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);