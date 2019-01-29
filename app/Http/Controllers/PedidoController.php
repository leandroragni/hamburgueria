<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dsin\Servicos\ServicoDePedido;

class PedidoController extends Controller
{
    public function __construct(ServicoDePedido $servicoDePedido)
    {
        $this->servicoDePedido = $servicoDePedido;
    }

    public function obterTodosPedidos()
    {
        return $this->servicoDePedido->obterTodosPedidos();
    }

    public function pedidosCliente(int $clienteId)
    {
        return $this->servicoDePedido->obtemPedidos($clienteId);
    }

    public function enviarPedido(Request $request)
    {
    	$pedido = [
    		'ids' => $request->get('item_id'),
    		'quantidade' => $request->get('quantidade'),
            'clienteId' => $request->get('cliente_id'),
            'enderecoId' => $request->get('endereco_id'),
    	];

        $infoPedido = $this->servicoDePedido->persistirPedido($pedido);

    	return view('pedido.confirmacao', [
            'pedido' => $infoPedido['pedido_realizado'],
            'id_pedido' => $infoPedido['id_pedido'],
        ]);
    }

    public function editarPedido(int $id)
    {
        $pedido = $this->servicoDePedido->obtemPedidoPorId($id);

        return view('pedido.editar', [
            'pedido' => $pedido,
        ]);
    }

    public function exibirPedidosEmAberto()
    {
        return $this->servicoDePedido->obterPedidosAbertos();
    }

    public function atualizarStatusDoPedido(Request $request)
    {
        return $this->servicoDePedido->atualizarStatusDoPedido($request->get('pedido_id'), $request->get('status'));
    }

    public function alterarPedido(Request $request)
    {
        return $this->servicoDePedido->alterarPedido($request->all());
    }
}
