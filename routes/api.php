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
