<?php

namespace Dsin\Repositorios;

use Dsin\Models\Endereco;
use Illuminate\Database\Eloquent\Builder;

class RepositorioDeEndereco
{
	private $model;

	public function __construct(Endereco $endereco)
	{
		$this->model = $endereco;
	}

	public function recuperarTodosEnderecosDoCliente(int $clienteId)
    {
        return $this->model->where('id_cliente', $clienteId)->get();
    }
}