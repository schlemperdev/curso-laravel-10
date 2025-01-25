<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\User as Usuario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $totalProdutos = $this->buscaTotalProdutos();
        $totalClientes = $this->buscaTotalClientes();
        $totalVendas = $this->buscaTotalVendas();
        $totalUsuarios = $this->buscaTotalUsuarios();
        
        return view('pages.dashboard.dashboard', compact('totalProdutos', 'totalClientes', 'totalVendas', 'totalUsuarios'));
    }

    public function buscaTotalProdutos(){
        $findProdutos = Produto::all()->count();
        
        return $findProdutos;
    }
    
    public function buscaTotalClientes(){
        $findClientes = Cliente::all()->count();
        
        return $findClientes;
    }
    
    public function buscaTotalVendas(){
        $findVendas = Venda::all()->count();
        
        return $findVendas;
    }
    
    public function buscaTotalUsuarios(){
        $findUsuarios = Usuario::all()->count();
        
        return $findUsuarios;
    }
}

