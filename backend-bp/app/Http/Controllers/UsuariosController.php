<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    // get
    public function index(){
        $usuarios = Usuarios::all();
        return response()->json($usuarios, 200);
    }

    // create
    public function store(Request $request){
        $validated = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'e-mail' => 'required|string',
            'estado' => 'required|string',
            'cpf' => 'required|string|unique:usuarios,cpf',
            'data_nascimento' => 'required|date'
        ]);

        $usuarios = Usuarios::create($validated);
        return response()->json($usuarios, 201);
    }

    // update
    public function update(Request $request, Usuarios $usuarios){
        $validated = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'e-mail' => 'required|string',
            'estado' => 'required|string',
            'cpf' => 'required|string|unique:usuarios,cpf',
            'data_nascimento' => 'required|date'
        ]);

        $usuarios -> update($validated);
        return response()->json($usuarios, 201);
    }

    // delete
    public function destroy(Usuarios $usuarios){ 
        $usuarios -> delete();
        return response()->json([
            'message' => 'Usuário deletado com sucesso!'
        ], 200);
    }

}
