<?php

namespace Dsin\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
		'id_cliente',
		'id_endereco',
		'status',
        'valor_total',
		'informacoes',
    ];

    public function itens()
    {
        return $this->hasMany('Dsin\Models\ItemDoPedido', 'id_pedido', 'id');
    }
}
