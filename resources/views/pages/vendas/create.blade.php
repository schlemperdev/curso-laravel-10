@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Venda</h1>
    </div>

    <form class="form" method="POST" action="{{ route('cadastrar.venda') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Numero da Venda</label>
            <input type="number" disabled value="{{ $findNumeroVenda }}" class="form-control @error('numeroDaVenda') is-invalid @enderror" name="numeroDaVenda">
            @if ($errors->has('numeroDaVenda'))
                <div class="invalid-feedback"> {{ $errors->first('numeroDaVenda') }} </div>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
@endsection