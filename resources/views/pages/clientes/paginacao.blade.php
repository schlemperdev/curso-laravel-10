{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
</div>
<div>
    <form action="{{ route('clientes.index') }}" method="get">
        <input type="text" name="pesquisar" placeholder="Digite aqui" />
        <button> Pesquisar </button>
        <a type="button" href=" {{ route('cadastrar.cliente') }} " class="btn btn-success float-end">
            Incluir Cliente
        </a>
    </form>
    
    <div class="table-responsive mt-4">
        @if ($findCliente->isEmpty())
            <p> Não existe dados </p>
        @endif
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Logradouro</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>CEP</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findCliente as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->logradouro }}</td>
                        <td>{{ $cliente->bairro }}</td>
                        <td>{{ $cliente->cidade }}</td>
                        <td>{{ $cliente->cep }}</td>
                        <td>
                            <meta name='csrf-token' content="{{ csrf_token() }}"/>
                            <a href="{{ route('atualizar.cliente', $cliente->id) }}" class="btn btn-dark btn-sm">
                                Editar
                            </a>
                            <meta name='csrf-token' content="{{ csrf_token() }}"/>
                            <a onclick="deleteRegistroPaginacao('{{ route('cliente.delete') }}', {{ $cliente->id }} )" class="btn btn-danger btn-sm">
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