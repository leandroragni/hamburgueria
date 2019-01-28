<?php

namespace Dsin\Repositorios;

use Dsin\Models\Cliente;
use Illuminate\Database\Eloquent\Builder;

class RepositorioDeCliente
{
	private $model;

	public function __construct(Cliente $cliente)
	{
		$this->model = $cliente;
	}

	public function recuperarTodosClientes()
    {
        return $this->model::all();
    }

    public function recuperarClientePorId(int $clienteId)
    {
        return $this->model->where('id', $clienteId)->get();
    }

    public function persistirCliente(array $cliente)
    {
        $clientePersistido = $this->model->create($cliente);

        if ($clientePersistido) {
            return $clientePersistido;
        }

        return false;
    }

    public function recuperarClientePorCpf(string $cpf)
    {
        return $this->model->where('cpf', $cpf)->first();
    }
}