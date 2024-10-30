<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valor extends Model
{
    use HasFactory;

    // TABELA VALORES
    protected $table = 'valores';
    // ATRIBUTOS
    protected $fillable = [
        'acao', 'valor', 'data', 'descricao'
    ];
}
