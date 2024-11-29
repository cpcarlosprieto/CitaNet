<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentControllerApi extends Controller
{
    public function index()
    {
        // Obtener todas las citas junto con el nombre del doctor
        $appointments = Appointment::with('doctor:id,name', 'patient:id,name')->get();
    
        return response()->json($appointments);
    }
    

    // Crear una nueva cita
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'scheduled_time' => 'required',
            'scheduled_date' => ['required', 'date'],
            'type' => 'required',
            'description' => 'nullable|string',
            'doctor_id' => ['required', 'exists:users,id'],
            'specialty_id' => ['required', 'exists:specialties,id'],
        ]);

        // Crear una nueva cita
        $appointment = new Appointment($validatedData);
        $appointment->save();

        return response()->json($appointment, 201);
    }
}
