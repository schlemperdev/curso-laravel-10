<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venda::create([
            'numeroDaVenda' => 1,
            'produto_id' => '5',
            'cliente_id' => '4',
        ]
        );

        Venda::create([
            'numeroDaVenda' => 2,
            'produto_id' => '12',
            'cliente_id' => '5',
        ]
        );
    }
}
