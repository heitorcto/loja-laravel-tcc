<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

// groups
// Route::controller(App\Http\Controllers::class)->group(function () {
// });

Route::post('produtos/cadastrar', [ProdutoController::class, 'cadastrar']);
Route::put('produtos/atualizar', [ProdutoController::class, 'atualizar']);
