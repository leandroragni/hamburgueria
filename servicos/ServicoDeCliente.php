<?php

namespace Dsin\Servicos;

use Dsin\Repositorios\RepositorioDeCliente;

class ServicoDeCliente
{
	private $repositorioDeCliente;

	public function __construct(RepositorioDeCliente $repositorioDeCliente) {
		$this->repositorioDeCliente = $repositorioDeCliente;
	}

	public function obterTodosClientes()
	{
		return $this->repositorioDeCliente->recuperarTodosClientes();
	}

	public function obterClientePorId(int $id)
	{
		return $this->repositorioDeCliente->recuperarClientePorId($id);
	}

	public function cadastrar(array $cliente)
	{
		if ($this->cpfEstaCadastrado($cliente['cpf'])) {
			return "Cpf já cadastrado, tente recuperar sua senha!";
		}

		return $this->repositorioDeCliente->persistirCliente($cliente);
	}

	private function cpfEstaCadastrado(string $cpf)
	{
		$cliente = $this->repositorioDeCliente->recuperarClientePorCpf($cpf);

		if ($cliente) {
			return true;
		}

		return null;
	}
}