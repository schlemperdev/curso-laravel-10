<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index (Request $request) 
    {
        $pesquisar = $request->pesquisar;
        $findVenda = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.vendas.paginacao', compact('findVenda'));
    }

    public function cadastrarVenda(FormRequestVenda $request)
    {
        $findNumeroVenda = Venda::max('numeroDaVenda') + 1;
        $findProduto = Produto::all();
        $findCliente = Cliente::all();

        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();
            $data['numeroDaVenda'] = $findNumeroVenda;
            Venda::create($data);
            Toastr::success('Venda incluída com sucesso', 'Cadastro realizado');
            return redirect()->route('vendas.index');
        }
        
        return view('pages.vendas.create', compact('findNumeroVenda', 'findProduto', 'findCliente'));
    }
}
