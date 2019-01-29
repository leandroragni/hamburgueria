<?php

namespace Dsin\Repositorios;

use Dsin\Models\Pedido;
use Dsin\ObjetosDeValor\StatusDoPedido;
use Illuminate\Database\Eloquent\Builder;

class RepositorioDePedido
{
	private $model;

	public function __construct(Pedido $pedido)
	{
		$this->model = $pedido;
	}

    public function recuperarTodosPedidos()
    {
        return $this->model::all();
    }

	public function recuperarItensDoCardapio(int $idPedido)
    {
        return $this->model::findById($idPedido);
    }

    public function persistirPedidoRealizado(array $pedido)
    {
    	$pedidoPersistido = $this->model->create($pedido);

        $itensPersistidos = $pedidoPersistido->itens()->createMany($pedido['itens']);

        if ($pedidoPersistido && $itensPersistidos) {
            return $pedidoPersistido->id;
        }

        return false;
    }

    public function atualizarStatusDoPedido(Pedido $pedido)
    {
    	if ($pedido->save()) {
            return 'Status do pedido atualizado!';
        };

        return $pedido;
    }

    public function recuperarPedidoPorId(int $id)
    {
        return $this->model->where('id', $id)->with('itens')->first();
    }

    public function recuperarPedidoEditavel(int $id)
    {
        $teste = $this->model
        ->where(
            [
                ['pedidos.id', '=', $id],
                ['pedidos.status', '=', StatusDoPedido::REALIZADO],
            ]
        )
        ->orWhere(
            [
                ['pedidos.id', '=', $id],
                ['pedidos.status', '=', StatusDoPedido::CONFIRMADO],
            ]
        )
        ->with('itens')->first();

        return $teste;
    }

    public function recuperarPedidosPorCliente(int $idCliente)
    {
        return $this->model->where('id_cliente', $idCliente)->with('itens')->get();
    }

    public function recuperarPedidosAbertos()
    {
        return $this->model->where('status', '!=', StatusDoPedido::ENTREGUE)->get();
    }
}