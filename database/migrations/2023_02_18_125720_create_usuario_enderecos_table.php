<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuario_enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('estado');
            $table->string('cidade');
            $table->integer('cep');
            $table->foreignId('usuario_id')->references('id')->on('usuarios');
            $table->datetime('criado_em');
            $table->datetime('atualizado_em');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_enderecos');
    }
};
