<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::create([
            'nome' => 'Cliente Teste',
            'email' => 'teste@teste.com.br',
            'endereço' => 'Rua Fictícia, 255',
            'logradouro' => 'Cidade Fantasma',
            'cep' => '88150-000',
            'bairro' => 'Bairro Aleatório',
        ]
        );
    }
}


