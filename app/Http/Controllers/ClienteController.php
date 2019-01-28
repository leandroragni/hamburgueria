<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dsin\Servicos\ServicoDeCliente;

class ClienteController extends Controller
{
	private $servicoDeCliente;

    public function __construct(ServicoDeCliente $servicoDeCliente)
    {
        $this->servicoDeCliente = $servicoDeCliente;
    }

    public function obterTodosClientes()
    {
        return $this->servicoDeCliente->obterTodosClientes();
    }

    public function obterCliente(int $id)
    {
        return $this->servicoDeCliente->obterClientePorId($id);
    }

    public function cadastrar(Request $request)
    {
        return $this->servicoDeCliente->cadastrar($request->all());
    }
}
