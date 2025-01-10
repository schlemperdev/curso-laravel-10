@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Usuario</h1>
    </div>

    <form class="form" method="POST" action="{{ route('cadastrar.usuario') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name">
            @if ($errors->has('name'))
                <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email">
            @if ($errors->has('email'))
                <div class="invalid-feedback"> {{ $errors->first('email') }} </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
            @if ($errors->has('password'))
                <div class="invalid-feedback"> {{ $errors->first('password') }} </div>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
@endsection