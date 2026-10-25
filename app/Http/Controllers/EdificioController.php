<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
    // Listar todos los edificios junto con sus aulas
    public function index()
    {
        return response()->json(Edificio::with('aulas')->get(), 200);
    }

    // Crear un nuevo edificio
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $edificio = Edificio::create($request->all());

        return response()->json([
            'message' => 'Edificio creado exitosamente',
            'data' => $edificio
        ], 201);
    }

    // Mostrar un edificio en específico con sus aulas
    public function show($id)
    {
        $edificio = Edificio::with('aulas')->find($id);

        if (!$edificio) {
            return response()->json(['message' => 'Edificio no encontrado'], 404);
        }

        return response()->json($edificio, 200);
    }

    // Actualizar un edificio
    public function update(Request $request, $id)
    {
        $edificio = Edificio::find($id);

        if (!$edificio) {
            return response()->json(['message' => 'Edificio no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $edificio->update($request->all());

        return response()->json([
            'message' => 'Edificio actualizado exitosamente',
            'data' => $edificio
        ], 200);
    }

    // Eliminar un edificio
    public function destroy($id)
    {
        $edificio = Edificio::find($id);

        if (!$edificio) {
            return response()->json(['message' => 'Edificio no encontrado'], 404);
        }

        $edificio->delete();

        return response()->json(['message' => 'Edificio eliminado exitosamente'], 200);
    }
}