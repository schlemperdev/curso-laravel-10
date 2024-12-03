{{-- Extends da index --}}
@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vendas</h1>
</div>
<div>
    <form action="{{ route('vendas.index') }}" method="get">
        <input type="text" name="pesquisar" placeholder="Digite aqui" />
        <button> Pesquisar </button>
        <a type="button" href=" {{ route('cadastrar.venda') }} " class="btn btn-success float-end">
            Incluir Venda
        </a>
    </form>
    
    <div class="table-responsive mt-4">
        @if ($findVenda->isEmpty())
            <p> Não existe dados </p>
        @endif
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nº da venda</th>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findVenda as $venda)
                    <tr>
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->numeroDaVenda }}</td>
                        <td>{{ $venda->cliente->nome }}</td>
                        <td>{{ $venda->produto->nome }}</td>
                        <td>
                            <meta name='csrf-token' content="{{ csrf_token() }}"/>
                            <a href="{{ route('enviaComprovanteEmail.venda', $venda->id) }}" class="btn btn-dark btn-sm">
                                Enviar E-mail
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection