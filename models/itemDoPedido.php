<?php

namespace Dsin\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDoPedido extends Model
{
    protected $table = 'itens_pedido';

    protected $fillable = [
		'id_pedido',
		'id_cardapio',
		'quantidade',
        'preco',
    ];

    public function pedido()
    {
        return $this->belongTo('Dsin\Models\Pedido');
    }

    public function cardapio()
    {
        return $this->hasOne('Dsin\Models\Cardapio');
    }
}
