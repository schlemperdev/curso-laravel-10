<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'endereço',
        'logradouro',
        'cep',
        'bairro',
    ];

    public function getClientesPesquisarIndex(string $search) 
    {
        $cliente = $this->where(function ($query) use ($search){
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");

                $query->orWhere('email', $search);
                $query->orWhere('email', 'LIKE', "%{$search}%");

                $query->orWhere('cep', $search);
                $query->orWhere('cep', 'LIKE', "%{$search}%");

                $query->orWhere('endereço', $search);
                $query->orWhere('endereço', 'LIKE', "%{$search}%");

                $query->orWhere('logradouro', $search);
                $query->orWhere('logradouro', 'LIKE', "%{$search}%");
                
                $query->orWhere('bairro', $search);
                $query->orWhere('bairro', 'LIKE', "%{$search}%");
            }
        })->get();

        return $cliente;
    }
}
