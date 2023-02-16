<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function cadastrar(ProdutoRequest $produtoRequest): JsonResponse
    {
        $produto = new Produto;
        $produto->nome = $produtoRequest->nome;
        $produto->descricao = $produtoRequest->descricao;
        $produto->preco = $produtoRequest->preco;
        $produto->quantidade_estoque = $produtoRequest->quantidade_estoque;
        $produto->categoria_produto_id = $produtoRequest->categoria_produto_id;
        $produto->save();

        return response()->json([
            'mensagem' => 'Produto cadastrado com sucesso.'
        ], 200);
    }

    public function atualizar(ProdutoRequest $produtoRequest): JsonResponse
    {
        $produto = Produto::findOrFail($produtoRequest->id);
        $produto->nome = $produtoRequest->nome;
        $produto->descricao = $produtoRequest->descricao;
        $produto->preco = $produtoRequest->preco;
        $produto->quantidade_estoque = $produtoRequest->quantidade_estoque;
        $produto->categoria_produto_id = $produtoRequest->categoria_produto_id;
        $produto->save();

        return response()->json([
            'mensagem' => 'Produto atualizado com sucesso.'
        ], 200);
    }

    public function exibir(ProdutoRequest $produtoRequest): JsonResponse
    {
        $produto = Produto::findOrFail($produtoRequest->id);

        return response()->json([
            $produto
        ], 200);
    }

    public function listar(): JsonResponse
    {
        $produto = Produto::paginate(10);

        return response()->json([
            $produto
        ], 200);
    }

    public function deletar(ProdutoRequest $produtoRequest): JsonResponse
    {
        $produto = Produto::findOrFail($produtoRequest->id);
        $produto->delete();

        return response()->json([
            'mensagem' => 'Produto deletado com sucesso.'
        ], 200);
    }
}
