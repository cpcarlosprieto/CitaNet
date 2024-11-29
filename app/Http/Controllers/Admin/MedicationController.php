<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medication;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medications = Medication::paginate(15); // Mostrar 15 medicamentos por página
        return view('medications.index', compact('medications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Definir las reglas de validación
        $rules = [
            'description' => 'required|min:5',
            'dose' => 'required',
            'presentation' => 'required',
            'expiration' => 'required|date',
            'laboratory' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ];

        // Definir los mensajes personalizados
        $messages = [
            'description.required' => 'La descripción es obligatoria.',
            'description.min' => 'La descripción debe tener al menos 5 caracteres.',
            'dose.required' => 'La dosis es obligatoria.',
            'presentation.required' => 'La presentación es obligatoria.',
            'expiration.required' => 'La fecha de caducidad es obligatoria.',
            'expiration.date' => 'La fecha de caducidad no es válida.',
            'laboratory.required' => 'El laboratorio es obligatorio.',
            'laboratory.min' => 'El nombre del laboratorio debe tener al menos 3 caracteres.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio debe ser mayor o igual a 0.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock debe ser mayor o igual a 0.',
        ];

        // Validar la solicitud
        $this->validate($request, $rules, $messages);

        // Crear el medicamento
        Medication::create($request->all());

        // Notificación de éxito
        $notification = "El medicamento se registró correctamente.";
        return redirect('/medicamentos')->with(compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medication = Medication::findOrFail($id);
        return view('medications.edit', compact('medication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Definir las reglas de validación para la actualización
        $rules = [
            'description' => 'required|min:5',
            'dose' => 'required',
            'presentation' => 'required',
            'expiration' => 'required|date',
            'laboratory' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ];

        // Mensajes personalizados
        $messages = [
            'description.required' => 'La descripción es obligatoria.',
            'description.min' => 'La descripción debe tener al menos 5 caracteres.',
            'dose.required' => 'La dosis es obligatoria.',
            'presentation.required' => 'La presentación es obligatoria.',
            'expiration.required' => 'La fecha de caducidad es obligatoria.',
            'expiration.date' => 'La fecha de caducidad no es válida.',
            'laboratory.required' => 'El laboratorio es obligatorio.',
            'laboratory.min' => 'El nombre del laboratorio debe tener al menos 3 caracteres.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio debe ser mayor o igual a 0.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock debe ser mayor o igual a 0.',
        ];

        // Validar la solicitud
        $this->validate($request, $rules, $messages);

        // Encontrar el medicamento y actualizarlo
        $medication = Medication::findOrFail($id);
        $medication->update($request->all());

        // Notificación de éxito
        $notification = "El medicamento se actualizó correctamente.";
        return redirect('/medicamentos')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medication = Medication::findOrFail($id);
        $medication->delete();

        // Notificación de éxito
        $notification = "El medicamento se eliminó correctamente.";
        return redirect('/medicamentos')->with(compact('notification'));
    }
}