<?php

namespace Dsin\Servicos;

use Dsin\Repositorios\RepositorioDeCardapio;
use Dsin\Repositorios\RepositorioDePedido;
use Dsin\ObjetosDeValor\StatusDoPedido;

class ServicoDePedido
{
	private $repositorioDeCardapio;

	private $repositorioDePedido;

	public function __construct(RepositorioDePedido $repositorioDePedido, RepositorioDeCardapio $repositorioDeCardapio ) {
		$this->repositorioDeCardapio = $repositorioDeCardapio;
		$this->repositorioDePedido = $repositorioDePedido;
	}

	public function obterTodosPedidos()
	{
		return $this->repositorioDePedido->recuperarTodosPedidos();
	}

	public function persistirPedido(array $pedido)
	{
		$pedido = $this->removeItensInvalidosDoPedido($pedido);

		$itensDoCardapio = $this->repositorioDeCardapio->recuperarItensDoCardapio($pedido['ids']);

		if ($this->validarPedido($pedido, $itensDoCardapio)) {
			$pedidoRealizado = $this->obtemInfoPedidoParaConfirmacao($pedido, $itensDoCardapio);

			$idPedido = $this->repositorioDePedido->persistirPedidoRealizado($pedidoRealizado);

			if ($idPedido) {
				return [
					'id_pedido' => $idPedido,
					'pedido_realizado' => $pedidoRealizado,
				];
			}

			return false;
		}

		return 'Não foi possível processar seu pedido, por favor tente novamente!';
	}

	public function obtemPedidoPorId(int $id)
	{
		return $this->repositorioDePedido->recuperarPedidoEditavel($id);
	}

	private function validarPedido(array $pedido, $itensDoCardapio)
	{
		if (!is_array($pedido)) {
			return false;
		}

		return true;
	}

	private function removeItensInvalidosDoPedido(array $pedido): array
	{
		foreach ($pedido['quantidade'] as $key => $item) {
			if (!is_numeric($item)) {
				array_forget($pedido, 'quantidade.' . $key);
				array_forget($pedido, 'ids.' . $key);
			}
		}

		return $pedido;
	}

	private function obtemInfoPedidoParaConfirmacao(array $pedido, $itensDoCardapio)
	{
		$clienteId = $pedido['clienteId'];
		$enderecoId = $pedido['enderecoId'];

		$pedido = $this->retornaIdsPorQuantidade($pedido);

		$itensDoPedido = $itensDoCardapio->map(function ($item) use ($pedido) {
			return [
				'id_cardapio' => $item->id,
				'nome' => $item->nome,
				'imagem' => $item->imagem,
				'preco' => $item->preco,
				'quantidade' => $pedido[$item->id],
				'preco_total_item' => $pedido[$item->id] * $item->preco,
			];
		});

		return [
			'id_cliente' => $clienteId,
			'id_endereco' => $enderecoId,
			'valor_total' => $this->obtemValorTotalDoPedido($itensDoPedido),
			'status' => StatusDoPedido::REALIZADO,
			'itens' => $itensDoPedido->toArray(),
		];
	}

	private function retornaIdsPorQuantidade(array $pedido)
	{
		$idsPorQuantidade = [];

		foreach ($pedido['ids'] as $key => $value) {
			$idsPorQuantidade[$pedido['ids'][$key]] = $pedido['quantidade'][$key];
		}

		return $idsPorQuantidade;
	}

	private function obtemValorTotalDoPedido($itensDoPedido)
	{
		return $itensDoPedido->sum('preco_total_item');
	}
}