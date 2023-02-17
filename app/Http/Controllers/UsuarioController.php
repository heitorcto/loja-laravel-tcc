<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use App\Models\Usuario;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function cadastrar(UsuarioRequest $usuarioRequest): JsonResponse
    {
        $usuario = new Usuario;
        $usuario->nome = $usuarioRequest->nome;
        $usuario->email = $usuarioRequest->email;
        $usuario->senha = Hash::make($usuarioRequest->senha);
        $usuario->data_nascimento = $usuarioRequest->dataNascimento;
        $usuario->cpf = $usuarioRequest->cpf;
        $usuario->criado_em = Carbon::now();
        $usuario->atualizado_em = Carbon::now();
        $usuario->save();

        return response()->json([
            'mensagem' => 'Usuário cadastrado com sucesso.',
        ]);
    }

    public function logar(UsuarioRequest $usuarioRequest): JsonResponse
    {
        $usuario = Usuario::select('senha')
            ->where('email', '=', $usuarioRequest->email)
            ->first();

        if (Hash::check($usuarioRequest->senha, $usuario->senha)) {
            return response()->json([
                'mensagem' => $usuario,
            ]);
        }
    }
}
