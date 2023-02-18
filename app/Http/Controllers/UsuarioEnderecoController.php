<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioEnrederoRequest;
use Illuminate\Http\JsonResponse;

class UsuarioEnderecoController extends Controller
{
    public function cadastrar(UsuarioEnrederoRequest $usuarioEnrederoRequest): JsonResponse
    {
        return response()->json([
            'mensagem' => 'Endereço cadastrado com sucesso.',
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
