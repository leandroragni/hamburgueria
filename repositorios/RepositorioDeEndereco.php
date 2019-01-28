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

    public function recuperarEnderecoPorId(int $enderecoId)
    {
    	return $this->model->where('id', $enderecoId)->get();
    }

    public function recuperarUltimoEnderecoDoCliente(int $clienteId)
    {
    	return $this->model->where('id_cliente', $clienteId)->orderBy('created_at', 'desc')->first();
    }

    public function persistirEndereco(array $endereco)
    {
    	$enderecoPersistido = $this->model->create($endereco);

    	if ($enderecoPersistido) {
    		return $enderecoPersistido;
    	}

    	return null;
    }
}