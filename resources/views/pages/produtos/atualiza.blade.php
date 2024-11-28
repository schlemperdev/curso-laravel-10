@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Produto</h1>
    </div>

    <form class="form" method="POST" action="{{ route('atualizar.produto', $findProduto->id) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{ isset($findProduto->nome) ? $findProduto->nome : old('nome') }}" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
                <div class="invalid-feedback"> {{ $errors->first('nome') }} </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input value="{{ isset($findProduto->valor) ? $findProduto->valor : old('valor') }}" class="form-control @error('valor') is-invalid @enderror" id="mascara_valor" name="valor">
            @if ($errors->has('valor'))
                <div class="invalid-feedback"> {{ $errors->first('valor') }} </div>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection