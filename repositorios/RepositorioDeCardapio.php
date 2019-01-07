<?php

namespace Dsin\Repositorios;

use Dsin\Models\Cardapio;
use Illuminate\Database\Eloquent\Builder;

class RepositorioDeCardapio
{
	private $model;

	public function __construct(Cardapio $cardapio)
	{
		$this->model = $cardapio;
	}

	public function recuperarTodosItensDoCardapio()
    {
        return $this->model::all();
    }

    public function recuperarItensDoCardapio(array $itensIds)
    {
        return $this->model->whereIN('id', $itensIds)->get();
    }
}