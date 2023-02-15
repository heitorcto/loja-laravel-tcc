<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Produto;

class ProdutoController extends Controller
{
    protected function cadastrar(ProdutoRequest $produtoRequest): JsonResponse
    {
        $produto = new Produto;
        $produto->nome = $produtoRequest->nome;
        $produto->descricao = $produtoRequest->descricao;
        $produto->preco = $produtoRequest->preco;
        $produto->quantidade_estoque = $produtoRequest->quantidade_estoque;
        $produto->categoria_produto_id = $produtoRequest->categoria_produto_id;
        $produto->save();

        return response()->json([
            'mensagem' => 'Cadastrado com sucesso.'
        ], 200);
    }

    protected function atualizar(ProdutoRequest $produtoRequest): JsonResponse
    {
        $produto = Produto::find($produtoRequest->id);
        $produto->nome = $produtoRequest->nome;
        $produto->descricao = $produtoRequest->descricao;
        $produto->preco = $produtoRequest->preco;
        $produto->quantidade_estoque = $produtoRequest->quantidade_estoque;
        $produto->categoria_produto_id = $produtoRequest->categoria_produto_id;
        $produto->save();

        return response()->json([
            'mensagem' => 'Cadastrado com sucesso.'
        ], 200);
        return response()->json([
            'mensagem' => 'Cadastrado com sucesso.'
        ], 200);
    }
}
