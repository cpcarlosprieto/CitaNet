<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Importa el modelo User
use Illuminate\Support\Facades\Hash; // Importa Hash para encriptar la contraseña
use Illuminate\Validation\ValidationException; // Para lanzar excepciones de validación

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // 'confirmed' requiere un campo de confirmación
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Encripta la contraseña
        ]);

        // Respuesta exitosa
        return response()->json(['message' => 'Usuario registrado exitosamente'], 201);
    }
}
