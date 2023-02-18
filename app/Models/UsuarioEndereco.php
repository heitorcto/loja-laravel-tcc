<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class UsuarioEndereco extends Model
{
    use HasFactory;

    protected $table = 'usuario_enderecos';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'estado',
        'cidade',
        'cep',
        'usuarios',
        'criado_em',
        'atualizado_em'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
}
