<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUsuario;
use App\Models\User as Usuario;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function index (Request $request) 
    {
        $pesquisar = $request->pesquisar;
        $findUsuario = $this->usuario->getUsuariosPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.usuarios.paginacao', compact('findUsuario'));
    }

    public function delete (Request $request) 
    {
        $id = $request->id;
        $buscaRegistro = Usuario::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarUsuario(FormRequestUsuario $request)
    {
        if ($request->method() == "POST") {
            //cria os dados
            $data = $request->all();
            $hashPassword = Hash::make($data['password']);
            $data['password'] = $hashPassword;
            Usuario::create($data);
            Toastr::success('Usuario incluído com sucesso', 'Cadastro realizado');
            return redirect()->route('usuarios.index');
        }
        
        return view('pages.usuarios.create');
    }

    public function atualizarUsuario(FormRequestUsuario $request, $id)
    {
        if ($request->method() == "PUT") {
            $data = $request->all();
            $hashPassword = Hash::make($data['password']);
            $data['password'] = $hashPassword;
            $buscaRegistro = Usuario::find($id);
            $buscaRegistro->update($data);
            return redirect()->route('usuarios.index');
        }
        //mostra os dados
        else
        {
            $findUsuario = Usuario::where('id', '=', $id)->first();
            return view('pages.usuarios.atualiza', compact('findUsuario'));
        }
    }
}
