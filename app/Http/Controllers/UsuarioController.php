<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Listar usuarios con un toque de elegancia.
     * Permitimos filtrar por puesto para darle más utilidad.
     */
    public function index(Request $request)
    {
        $query = Usuario::query();

        // Filtro discreto: si envían ?puesto= lo filtramos
        if ($request->has('puesto')) {
            $query->where('puesto', 'like', '%' . $request->puesto . '%');
        }

        // Seleccionamos solo los campos necesarios para que sea minimalista
        $usuarios = $query->select('id', 'nombre', 'email', 'puesto')->get();

        return response()->json([
            'status' => 'success',
            'count'  => $usuarios->count(),
            'data'   => $usuarios
        ], 200);
    }

    /**
     * Registro con validación impecable.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email'  => 'required|email|unique:usuarios,email',
            'puesto' => 'required|string|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $usuario = Usuario::create($request->all());

        return response()->json([
            'status'  => 'success',
            'message' => 'Un nuevo integrante ha llegado a Wonderland',
            'data'    => $usuario->only(['id', 'nombre', 'puesto']) // Minimalismo
        ], 201);
    }

    /**
     * Eliminar con respuesta profesional.
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'status'  => 'error',
                'message' => 'No pudimos encontrar el registro solicitado'
            ], 404);
        }

        $usuario->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Registro removido con éxito'
        ], 200);
    }
}