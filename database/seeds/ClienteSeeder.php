<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome' => 'Cliente da Silva',
            'email' => 'clientedasilva@teste.com',
            'cpf' => '111.000.123.35',
        ]);
    }
}
