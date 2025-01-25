<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCliente;
use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index (Request $request) 
    {
        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete (Request $request) 
    {
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarCliente(FormRequestCliente $request)
    {
        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();
            /* $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']); */
            Cliente::create($data);
            Toastr::success('Cliente incluído com sucesso', 'Cadastro realizado');
            return redirect()->route('clientes.index');
        }
        
        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestCliente $request, $id)
    {
        if ($request->method() == "PUT") {
            $data = $request->all();
            /* $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']); */
            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);
            Toastr::success('Cliente atualizado com sucesso', 'Alteração realizada');
            return redirect()->route('clientes.index');
        }
        //mostra os dados
        else
        {
            $findCliente = Cliente::where('id', '=', $id)->first();
            return view('pages.clientes.atualiza', compact('findCliente'));
        }
    }
}
