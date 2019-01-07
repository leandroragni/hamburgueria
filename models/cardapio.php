<?php

namespace Dsin\Models;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $table = 'cardapio';

    protected $fillable = [
		'nome',
		'descricao',
		'preco',
		'imagem',
    ];
}
