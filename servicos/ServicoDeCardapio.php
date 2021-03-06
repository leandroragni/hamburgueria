<?php

namespace Dsin\Servicos;

use Dsin\Repositorios\RepositorioDeCardapio;

class ServicoDeCardapio
{
	private $repositorioDeCardapio;

	public function __construct(RepositorioDeCardapio $repositorioDeCardapio) {
		$this->repositorioDeCardapio = $repositorioDeCardapio;
	}

	public function cadastrarItem(array $item)
	{
		return $this->repositorioDeCardapio->persistirItem($item);
	}

	public function obtemItensDoCardapio()
	{
		return $this->repositorioDeCardapio->recuperarTodosItensDoCardapio();
	}
}