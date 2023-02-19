<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioEnrederoRequest;
use Illuminate\Http\JsonResponse;
use App\Models\UsuarioEndereco;
use Carbon\Carbon;

class UsuarioEnderecoController extends Controller
{
    public function cadastrar(UsuarioEnrederoRequest $usuarioEnrederoRequest): JsonResponse
    {
        $enderecoUsuario = new UsuarioEndereco;
        $enderecoUsuario->nome = $usuarioEnrederoRequest->nome;
        $enderecoUsuario->estado = $usuarioEnrederoRequest->estado;
        $enderecoUsuario->cidade = $usuarioEnrederoRequest->cidade;
        $enderecoUsuario->cep = $usuarioEnrederoRequest->cep;
        $enderecoUsuario->criado_em = Carbon::now();
        $enderecoUsuario->atualizado_em = Carbon::now();
        $enderecoUsuario->usuario_id = $usuarioEnrederoRequest->user()->id;
        $enderecoUsuario->save();

        return response()->json([
            'mensagem' => 'Endereço cadastrado com sucesso.'
        ], 200);
    }

    // public function atualizar(UsuarioEnrederoRequest $usuarioEnrederoRequest): JsonResponse
    // {
    // }

    // public function exibir(UsuarioEnrederoRequest $usuarioEnrederoRequest): JsonResponse
    // {
    // }

    // public function listar(): JsonResponse
    // {
    // }

    // public function deletar(UsuarioEnrederoRequest $usuarioEnrederoRequest): JsonResponse
    // {
    // }
}
