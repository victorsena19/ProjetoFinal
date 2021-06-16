<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'valor',
        'descricao',
        'imagem_nome',
        'imagem_path',
        'updated_at',
        'create_at',
    ];


}
