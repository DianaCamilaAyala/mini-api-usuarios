<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // 1. LISTAR TODOS
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios, 200);
    }

    // 2. CREAR NUEVO
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email|unique:usuarios',
            'puesto' => 'required|string'
        ]);

        $usuario = Usuario::create($request->all());

        return response()->json([
            'mensaje' => 'Usuario creado con éxito',
            'data' => $usuario
        ], 201);
    }

    // 3. ACTUALIZAR (EDITAR)
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }

        $usuario->update($request->all());

        return response()->json([
            'mensaje' => 'Usuario actualizado con éxito',
            'data' => $usuario
        ], 200);
    }

    // 4. ELIMINAR (BORRAR)
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json([
            'mensaje' => 'Usuario eliminado correctamente'
        ], 200);
    }
}