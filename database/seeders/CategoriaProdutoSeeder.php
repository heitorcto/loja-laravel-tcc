<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaProduto;

class CategoriaProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriasProdutos = [
            [
                'nome' => 'Eletrônicos',
                'descricao' => 'Essa é a descrição de produtos Eletrônicos'
            ],

            [
                'nome' => 'Livros',
                'descricao' => 'Essa é a descrição de produtos Livros'
            ],

            [
                'nome' => 'Filmes e Séries',
                'descricao' => 'Essa é a descrição de produtos Filmes e Séries'
            ],

            [
                'nome' => 'Jogos',
                'descricao' => 'Essa é a descrição de produtos Jogos'
            ],

            [
                'nome' => 'Cozinha',
                'descricao' => 'Essa é a descrição de produtos Cozinha'
            ],

            [
                'nome' => 'Automotivo',
                'descricao' => 'Essa é a descrição de produtos Automotivo'
            ],

            [
                'nome' => 'Alimentos',
                'descricao' => 'Essa é a descrição de produtos Alimentos'
            ],

            [
                'nome' => 'Brinquedos',
                'descricao' => 'Essa é a descrição de produtos Brinquedos'
            ],

            [
                'nome' => 'Roupas',
                'descricao' => 'Essa é a descrição de produtos Roupas'
            ],

            [
                'nome' => 'Bolsas',
                'descricao' => 'Essa é a descrição de produtos Bolsas'
            ],

            [
                'nome' => 'Pets',
                'descricao' => 'Essa é a descrição de produtos Pets'
            ],
        ];

        foreach ($categoriasProdutos as $categoria) {
            $categoriaProduto = new CategoriaProduto;
            $categoriaProduto->nome = $categoria['nome'];
            $categoriaProduto->descricao = $categoria['descricao'];
            $categoriaProduto->save();
        }
    }
}
