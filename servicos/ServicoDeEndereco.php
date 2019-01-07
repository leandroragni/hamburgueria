<?php

namespace Dsin\Servicos;

use Dsin\Repositorios\RepositorioDeEndereco;

class ServicoDeEndereco
{
	private $repositorioDeEndereco;

	public function __construct(RepositorioDeEndereco $repositorioDeEndereco) {
		$this->repositorioDeEndereco = $repositorioDeEndereco;
	}

	public function obtemEnderecosDoCliente(int $clienteId)
	{
		$enderecos = $this->repositorioDeEndereco->recuperarTodosEnderecosDoCliente($clienteId);

		$enderecosCompletos = [];

		foreach ($enderecos as $endereco) {
			$enderecosCompletos[] = [
				'id' => $endereco->id,
				'extenso' => "$endereco->rua,  $endereco->numero,  $endereco->cidade",
			];
		}

		return $enderecosCompletos;
	}
}