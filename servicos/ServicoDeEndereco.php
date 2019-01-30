<?php

namespace Dsin\Servicos;

use Dsin\Repositorios\RepositorioDeEndereco;
use Dsin\Repositorios\RepositorioDeCliente;

class ServicoDeEndereco
{
	private $repositorioDeEndereco;

	private $repositorioDeCliente;

	public function __construct(RepositorioDeEndereco $repositorioDeEndereco, RepositorioDeCliente $repositorioDeCliente) {
		$this->repositorioDeEndereco = $repositorioDeEndereco;
		$this->repositorioDeCliente = $repositorioDeCliente;
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

	public function obterUltimoEnderecoCadastradoClienteId(int $clienteId)
	{
		return $this->repositorioDeEndereco->recuperarUltimoEnderecoDoCliente($clienteId);
	}

	public function obterEnderecoPorId(int $enderecoId)
	{
		return $this->repositorioDeEndereco->recuperarEnderecoPorId($enderecoId);
	}

	public function cadastrarEndereco(array $endereco)
	{
		if ($this->clienteEstaCadastrado($endereco['id_cliente'])) {
			return $this->repositorioDeEndereco->persistirEndereco($endereco);
		}

		return false;
	}

	private function clienteEstaCadastrado(int $clienteId)
	{
		$cliente = $this->repositorioDeCliente->recuperarClientePorId($clienteId);

		if ($cliente) {
			return $cliente;
		}

		return false;
	}
}