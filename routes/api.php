<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginControllerApi;
use App\Http\Controllers\AppointmentControllerApi;

/*
|--------------------------------------------------------------------------|
| API Routes                                                              |
|--------------------------------------------------------------------------|
| Here is where you can register API routes for your application. These   |
| routes are loaded by the RouteServiceProvider within a group which is   |
| assigned the "api" middleware group. Enjoy building your API!            |
|--------------------------------------------------------------------------|
*/

// Ruta para obtener todas las citas
Route::get('/appointments', [AppointmentControllerApi::class, 'index']);

// Ruta para crear una nueva cita
Route::post('/appointments', [AppointmentControllerApi::class, 'store']);

// Ruta para registrar un usuario
Route::post('/register', [UserController::class, 'register']);

// Ruta para iniciar sesión
Route::post('/login', [AuthController::class, 'login']);

// Ruta para iniciar sesión a través de la API
Route::post('/login-api', [LoginControllerApi::class, 'login-api']);
