<?php

use Illuminate\Http\Request;

Route::get('/cardapio', 'CardapioController@exibirCardapio');
Route::get('/cardapio/{clienteId}', 'CardapioController@apiIndex')->where('clienteId', '[+-]?[0-9]{1,10}');
Route::post('/cardapio', 'CardapioController@cadastrar');

Route::get('/clientes', 'ClienteController@obterTodosClientes');
Route::get('/cliente/{id}', 'ClienteController@obterCliente')->where('id', '[+-]?[0-9]{1,10}');
Route::post('/cliente', 'ClienteController@cadastrar');

Route::get('/endereco/cliente/{clienteId}', 'EnderecoController@obterEnderecosPorClienteId')->where('clienteId', '[+-]?[0-9]{1,10}');
Route::get('/endereco/{id}', 'EnderecoController@obterEnderecoPorId')->where('id', '[+-]?[0-9]{1,10}');
Route::get('/endereco/ultimo/cliente/{clienteId}', 'EnderecoController@obterUltimoEnderecoCadastradoClienteId')->where('clienteId', '[+-]?[0-9]{1,10}');
Route::post('/endereco', 'EnderecoController@cadastrar');

Route::get('/pedidos', 'PedidoController@obterTodosPedidos');
Route::post('/enviar/pedido', 'PedidoController@enviarPedido');
Route::get('/editar/pedido/{id}', 'PedidoController@editarPedido')->where('id', '[+-]?[0-9]{1,10}');
Route::get('/pedidos/abertos', 'PedidoController@exibirPedidosEmAberto');
Route::put('/pedidos/status/atualizar', 'PedidoController@atualizarStatusDoPedido');
Route::put('/editar/pedido', 'PedidoController@alterarPedido');

