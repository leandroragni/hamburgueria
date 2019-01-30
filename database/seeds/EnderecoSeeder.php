<?php

use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enderecos')->insert([
            "id_cliente" => 1,
			"rua" => "Rua do cliente",
			"bairro" => "Bairro do cliente",
			"numero" => "Número do cliente",
			"cep" => "12345-123",
			"cidade" => "cidade"
        ]);
    }
}
