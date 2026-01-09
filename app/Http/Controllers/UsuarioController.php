<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Listar los integrantes registrados.
     * Soporta filtrado discreto por puesto.
     */
    public function index(Request $request)
    {
        $query = Usuario::query();

        // Aplicar filtro si se solicita un puesto específico
        if ($request->has('puesto')) {
            $query->where('puesto', 'like', '%' . $request->puesto . '%');
        }

        // Devolvemoslo esencial 
        $usuarios = $query->select('id', 'nombre', 'email', 'puesto')->get();

        return response()->json([
            'status' => 'success',
            'count'  => $usuarios->count(),
            'data'   => $usuarios
        ], 200);
    }

    /**
     * Registrar un nuevo integrante con validación elegante.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email'  => 'required|email|unique:usuarios,email',
            'puesto' => 'required|string|max:100'
        ], [
            // Mensajes personalizado
            'email.unique' => 'Este correo ya pertenece a un integrante en Wonderland.',
            'required' => 'El campo :attribute es indispensable para el registro.'
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
            'data'    => $usuario->only(['id', 'nombre', 'puesto'])
        ], 201);
    }

    /**
     * Eliminar un registro con manejo de ausencia
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'status'  => 'error',
                'message' => 'El integrante solicitado no existe en nuestros registros'
            ], 404);
        }

        $usuario->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Registro removido con éxito'
        ], 200);
    }
}