<?php

use Illuminate\Http\Request;

Route::get('/cardapio', 'CardapioController@exibirCardapio');
Route::get('/cardapio/{clienteId}', 'CardapioController@apiIndex');

Route::get('/clientes', 'ClienteController@obterTodosClientes');
Route::get('/cliente/{id}', 'ClienteController@obterCliente');
Route::post('/cliente', 'ClienteController@cadastrar');

Route::get('/endereco/cliente/{clienteId}', 'EnderecoController@obterEnderecosPorClienteId');
Route::get('/endereco/{id}', 'EnderecoController@obterEnderecoPorId');
Route::get('/endereco/ultimo/cliente/{clienteId}', 'EnderecoController@obterUltimoEnderecoCadastradoClienteId');
Route::post('/endereco', 'EnderecoController@cadastrar');

Route::get('/pedidos', 'PedidoController@obterTodosPedidos');
Route::get('/editar/pedido/{id}', 'PedidoController@editarPedido');
Route::post('/enviar/pedido', 'PedidoController@enviarPedido');
