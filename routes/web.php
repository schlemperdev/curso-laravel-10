<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group( function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::prefix('produtos')->group( function (){
    Route::get('/', [ProdutosController::class, 'index'])->name('produtos.index');
    //Cadastro Create
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    //Atualiza Update
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    //Deletar Delete
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produtos.delete');
});

Route::prefix('clientes')->group( function (){
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
    //Cadastro Create
    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    //Atualiza Update
    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    //Deletar Delete
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});

Route::prefix('vendas')->group( function (){
    Route::get('/', [VendasController::class, 'index'])->name('vendas.index');
    //Cadastro Create
    Route::get('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::get('/enviaComprovanteEmail/{id}', [VendasController::class, 'enviaComprovanteEmail'])->name('enviaComprovanteEmail.venda');
});

Route::prefix('usuarios')->group( function (){
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios.index');
    //Cadastro Create
    Route::get('/cadastrarUsuario', [UsuariosController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');
    Route::post('/cadastrarUsuario', [UsuariosController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');
    //Atualiza Update
    Route::get('/atualizarUsuario/{id}', [UsuariosController::class, 'atualizarUsuario'])->name('atualizar.usuario');
    Route::put('/atualizarUsuario/{id}', [UsuariosController::class, 'atualizarUsuario'])->name('atualizar.usuario');
    //Deletar Delete
    Route::delete('/delete', [UsuariosController::class, 'delete'])->name('usuario.delete');
});