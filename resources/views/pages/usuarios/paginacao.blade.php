{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuarios</h1>
</div>
<div>
    <form action="{{ route('usuarios.index') }}" method="get">
        <input type="text" name="pesquisar" placeholder="Digite aqui" />
        <button> Pesquisar </button>
        <a type="button" href=" {{ route('cadastrar.usuario') }} " class="btn btn-success float-end">
            Incluir Usuario
        </a>
    </form>
    
    <div class="table-responsive mt-4">
        @if ($findUsuario->isEmpty())
            <p> Não existe dados </p>
        @endif
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findUsuario as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <meta name='csrf-token' content="{{ csrf_token() }}"/>
                            <a href="{{ route('atualizar.usuario', $usuario->id) }}" class="btn btn-dark btn-sm">
                                Editar
                            </a>
                            <meta name='csrf-token' content="{{ csrf_token() }}"/>
                            <a onclick="deleteRegistroPaginacao('{{ route('usuario.delete') }}', {{ $usuario->id }} )" class="btn btn-danger btn-sm">
                                Excluir
                            </a>
                        </td>
                    </tr>                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection