<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dsin\Servicos\ServicoDeCardapio;
use Dsin\Servicos\ServicoDeEndereco;

class CardapioController extends Controller
{
	private $servicoDeCardapio;

	private $servicoDeEndereco;

    public function __construct(ServicoDeCardapio $servicoDeCardapio, ServicoDeEndereco $servicoDeEndereco)
    {
        $this->servicoDeCardapio = $servicoDeCardapio;
        $this->servicoDeEndereco = $servicoDeEndereco;
    }

    public function redirecionarIndex()
    {
        return redirect('cardapio');
    }

    public function index()
    {
        $itensCardapio = $this->servicoDeCardapio->obtemItensDoCardapio();

        $enderecosDeEntrega = $this->servicoDeEndereco->obtemEnderecosDoCliente(1);

        return view('cardapio.itens', [
        	'itens' => $itensCardapio,
        	'enderecos' => $enderecosDeEntrega,
        ]);
    }

    public function apiIndex(int $clienteId)
    {
        $itensCardapio = $this->servicoDeCardapio->obtemItensDoCardapio();

        $enderecosDeEntrega = $this->servicoDeEndereco->obtemEnderecosDoCliente($clienteId);

        return [
            'itens' => $itensCardapio,
            'enderecos' => $enderecosDeEntrega,
        ];
    }

    public function exibirCardapio()
    {
        $itensCardapio = $this->servicoDeCardapio->obtemItensDoCardapio();

        return [
            'itens' => $itensCardapio,
        ];
    }
}
