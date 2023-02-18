<?php

use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\ProdutoController::class)->group(function () {
    Route::prefix('produtos')->group(function () {
        Route::post('cadastrar', 'cadastrar');
        Route::put('atualizar', 'atualizar');
        Route::get('exibir', 'exibir');
        Route::get('listar', 'listar');
        Route::delete('deletar', 'deletar');
    });
});

Route::controller(App\Http\Controllers\UsuarioController::class)->group(function () {
    Route::prefix('usuario')->group(function () {
        Route::post('cadastrar', 'cadastrar');
        Route::post('logar', 'logar');
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('informacao', 'resgatarInformacaoUsuario');
            Route::delete('sair', 'sair');
        });
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(App\Http\Controllers\UsuarioEnderecoController::class)->group(function () {
        Route::prefix('usuario-endereco')->group(function () {
            Route::post('cadastrar', 'cadastrar');
        });
    });
});
