<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade_estoque',
        'media_avaliacao',
        'categoria_produto_id'
    ];

    public function categoriaProduto(): BelongsTo
    {
        return $this->belongsTo(CategoriaProduto::class);
    }
}
