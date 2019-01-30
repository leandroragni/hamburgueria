<?php

namespace Dsin\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    protected $fillable = [
		'idUsuario',
		'rua',
		'bairro',
		'numero',
		'cep',
		'cidade',
		'id_cliente',
    ];
}
