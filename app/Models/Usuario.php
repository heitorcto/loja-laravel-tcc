<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'data_nascimento',
        'cpf',
        'criado_em',
        'atualizado_em'
    ];
}
