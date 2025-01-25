@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    {{-- Row 1 --}}
    <div class="row">
        {{-- Card 1 --}}
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Produtos</h5>
              <p class="card-text">Total de produtos cadastrados no sistema.</p>
              <div class="badge text-bg-light text-wrap" style="width: 6rem;">
                  <p class="h5">{{ $totalProdutos }}</p>
              </div>
            </div>
          </div>
        </div>
        {{-- Card 2 --}}
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Clientes</h5>
              <p class="card-text">Total de clientes cadastrados no sistema.</p>
              <div class="badge text-bg-light text-wrap" style="width: 6rem;">
                  <p class="h5">{{ $totalClientes }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Row 2 --}}
      <div class="row mt-3">
        {{-- Card 1 --}}
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vendas</h5>
              <p class="card-text">Total de vendas cadastradas no sistema.</p>
              <div class="badge text-bg-light text-wrap" style="width: 6rem;">
                  <p class="h5">{{ $totalVendas }}</p>
              </div>
            </div>
          </div>
        </div>
        {{-- Card 2 --}}
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Usuários</h5>
              <p class="card-text">Total de usuários cadastrados no sistema.</p>
                <div class="badge text-bg-light text-wrap" style="width: 6rem;">
                    <p class="h5">{{ $totalUsuarios }}</p>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection