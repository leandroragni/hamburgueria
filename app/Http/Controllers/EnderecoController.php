<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dsin\Servicos\ServicoDeEndereco;

class EnderecoController extends Controller
{
	private $servicoDeEndereco;

    public function __construct(ServicoDeEndereco $servicoDeEndereco)
    {
        $this->servicoDeEndereco = $servicoDeEndereco;
    }

    public function obterEnderecosPorClienteId(int $clienteId)
    {
        return $this->servicoDeEndereco->obtemEnderecosDoCliente($clienteId);
    }

    public function obterUltimoEnderecoCadastradoClienteId(int $clienteId)
    {
        return $this->servicoDeEndereco->obterUltimoEnderecoCadastradoClienteId($clienteId);
    }

    public function obterEnderecoPorId(int $id)
    {
        return $this->servicoDeEndereco->obterEnderecoPorId($id);
    }

    public function cadastrar(Request $request)
    {
        return $this->servicoDeEndereco->cadastrarEndereco($request->all());
    }
}
