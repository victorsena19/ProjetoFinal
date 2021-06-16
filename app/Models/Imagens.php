<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagens extends Model
{
    protected $table = 'imagens';

    protected $fillable = [
        'name',
        'path',
        'updated_at',
        'create_at',
    ];


}
