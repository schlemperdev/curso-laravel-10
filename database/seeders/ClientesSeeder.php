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
            'cidade' => 'Cidade Fantasma',
            'logradouro' => 'Rua Fictícia, 255',
            'cep' => '88150-000',
            'bairro' => 'Bairro Aleatório',
        ]
        );
    }
}


