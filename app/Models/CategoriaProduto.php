<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    use HasFactory;

    protected $table = 'categorias_produtos';

    public $timestamps = false;

    protected $fillabe = [
        'nome',
        'descricao',
    ];

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class);
    }
}
