<?php

use Illuminate\Database\Seeder;

class CardapioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cardapio')->insert([
            'nome' => 'X-TESTE',
            'descricao' => 'Pão, hamburguer, testes, queijo, alface e tomate',
            'imagem' => 'public/xsalada',
            'preco' => 10,
        ]);
    }
}
