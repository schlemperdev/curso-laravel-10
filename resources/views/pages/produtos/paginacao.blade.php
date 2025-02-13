{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
</div>
<div>
    <form action="{{ route('produtos.index') }}" method="get">
        <input type="text" name="pesquisar" placeholder="Digite aqui" />
        <button> Pesquisar </button>
        <a type="button" href=" {{ route('cadastrar.produto') }} " class="btn btn-success float-end">
            Incluir Produto
        </a>
    </form>
    
    <div class="table-responsive mt-4">
        @if ($findProduto->isEmpty())
            <p> Não existe dados </p>
        @endif
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findProduto as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ 'R$ ' . number_format($produto->valor, 2, ',', '.') }}</td>
                        <td>
                            <meta name='csrf-token' content="{{ csrf_token() }}"/>
                            <a href="{{ route('atualizar.produto', $produto->id) }}" class="btn btn-dark btn-sm">
                                Editar
                            </a>
                            <meta name='csrf-token' content="{{ csrf_token() }}"/>
                            <a onclick="deleteRegistroPaginacao('{{ route('produtos.delete') }}', {{ $produto->id }} )" class="btn btn-danger btn-sm">
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