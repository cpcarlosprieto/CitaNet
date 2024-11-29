<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginControllerApi extends Controller
{
    public function loginapi(Request $request)
    {
        // Validar los datos del request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Intentar autenticar al usuario
            if (Auth::attempt($credentials)) {
                // Login exitoso
                $user = Auth::user();
                return response()->json([
                    'success' => true,
                    'message' => 'Login exitoso',
                    'user' => $user,  // Incluye los datos del usuario autenticado
                ], 200);
            } else {
                // Login fallido
                return response()->json([
                    'success' => false,
                    'message' => 'Credenciales incorrectas',
                ], 401);
            }
        } catch (\Exception $e) {
            // Manejo de excepciones
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error durante el proceso de autenticación',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
