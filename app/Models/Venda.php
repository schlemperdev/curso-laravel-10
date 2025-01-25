<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numeroDaVenda',
        'produto_id',
        'cliente_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function getVendasPesquisarIndex(string $search) 
    {
        $venda = $this->where(function ($query) use ($search){
            if ($search) {
                $query->where('numeroDaVenda', $search);
                $query->orWhere('numeroDaVenda', 'LIKE', "%{$search}%");
                /* $query->orwhere('produto_id', $search);
                $query->orWhere('produto_id', 'LIKE', "%{$search}%"); */
            }
        })->get();

        return $venda;
    }
}
