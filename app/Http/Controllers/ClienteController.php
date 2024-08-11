<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        // Validar los datos del request
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'mail' => 'required|string|email|unique:clientes,mail',
            'telefono' => 'nullable|string|max:20',
        ]);

        // Crear un nuevo cliente
        $cliente = Cliente::create([
            'nombres' => $validated['nombres'],
            'apellidos' => $validated['apellidos'],
            'empresa' => $validated['empresa'],
            'mail' => $validated['mail'],
            'telefono' => $validated['telefono'],
        ]);

        // Devolver la respuesta en formato JSON
        return response()->json($cliente, 201); // Corregido aquí
    }

    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    public function update(Request $request, Cliente $cliente)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'empresa' => 'nullable|string|max:255',
            'mail' => ['required', 'string', 'email', Rule::unique('clientes', 'mail')->ignore($cliente->id)],
            'telefono' => 'nullable|string|max:20',
        ]);

        // Actualizar el cliente
        $cliente->update([
            'nombres' => $validated['nombres'],
            'apellidos' => $validated['apellidos'],
            'empresa' => $validated['empresa'],
            'mail' => $validated['mail'],
            'telefono' => $validated['telefono'],
        ]);

        // Retornar la respuesta JSON
        return response()->json($cliente, 200);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete(); // Realiza un borrado lógico
        return response()->json(null, 204); // Devuelve un código 204 sin contenido
    }
}
