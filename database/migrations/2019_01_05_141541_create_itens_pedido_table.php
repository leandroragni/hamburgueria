<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pedido');
            $table->unsignedInteger('id_cardapio');
            $table->integer('quantidade');
            $table->float('preco', 8, 2);
            $table->timestamps();
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreign('id_cardapio')->references('id')->on('cardapio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_pedido');
    }
}
