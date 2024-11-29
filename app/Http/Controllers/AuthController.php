<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Importación de Auth para la autenticación
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Método para el registro de usuarios
    public function register(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Asegúrate de que el campo "password_confirmation" esté presente en la solicitud
            'identity_card' => 'nullable|string|max:20|unique:users',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'role' => 'required|string|max:50',
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptar la contraseña
            'identity_card' => $request->identity_card,
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        // Retornar una respuesta con un token de API
        return response()->json([
            'message' => 'Usuario registrado exitosamente',
            'user' => $user,
            'token' => $user->createToken('AppToken')->plainTextToken,
        ], 201); // Código 201 indica que el recurso fue creado
    }

    // Método para el login de usuarios
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa
            $user = Auth::user();

            return response()->json([
                'message' => 'Inicio de sesión exitoso',
                'user' => $user,
                'token' => $user->createToken('AppToken')->plainTextToken,
            ]);
        } else {
            // Si la autenticación falla
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        }
    }
}
