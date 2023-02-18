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
        ], 200);
    }

    public function logar(UsuarioRequest $usuarioRequest): JsonResponse
    {
        $usuario = Usuario::select('id', 'nome', 'senha')
            ->where('email', '=', $usuarioRequest->email)
            ->first();

        if (!$usuario || !Hash::check($usuarioRequest->senha, $usuario->senha)) {
            return response()->json([
                'mensagem' => 'Credenciais incorretas.',
            ]);
        }

        $token = $usuario
            ->createToken($usuario->nome)
            ->plainTextToken;

        return response()->json([
            'mensagem' => 'Logado com sucesso.',
            'token' => $token
        ], 200);
    }

    public function resgatarInformacaoUsuario(UsuarioRequest $usuarioRequest): JsonResponse
    {
        return response()->json([
            $usuarioRequest->user()
        ]);
    }

    public function sair(UsuarioRequest $usuarioRequest): JsonResponse
    {
        $usuarioRequest->user()->tokens()->delete();

        return response()->json([
            'mensagem' => 'Deslogado com sucesso.'
        ], 200);
    }
}
