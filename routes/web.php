<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/login', 'LoginController@index')->name('entrar');
Route::post('/create', 'LoginController@logar')->name('logar');
Route::get('/sair', 'LoginController@Deslogar')->name('sair');

Route::post('/criar', 'CreateAccount@index')->name('index');
Route::get('/criar', 'CreateAccount@criar')->name('inicio');

Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.visualizar')->middleware('Login');
Route::get('/CadastrarFuncionario', 'CadastrarFuncionarController@index')->name('visualizarUsuarios')->middleware('Login');
Route::post('/CadastrarFuncionario', 'CadastrarFuncionarController@Cadastrar')->name('CadastrarFuncionario')->middleware('Login');
Route::get('/usuario/edit/{id}/{msg?}', 'CadastrarFuncionarController@edit')->name('editar.funcioanario')->middleware('Login');
Route::post('/usuario/edit/{id}/{msg?}', 'CadastrarFuncionarController@update')->name('atualizar.funcioanario')->middleware('Login');
Route::get('/usuario/delete/{id}/{msg?}', 'CadastrarFuncionarController@destroy')->name('excluir.funcionario')->middleware('Login');



Route::get('/inicio', function () {
    return view('inicioLogin');
})->name('inicio.login');

Route::get('/produtos', 'ProdutosController@index')->name('produtos')->middleware('Login');
Route::post('/produtos', 'ProdutosController@Cadastrar')->name('cadastrarProdutos')->middleware('Login');
Route::get('/exibirProdutos', 'ProdutosController@exibirProdutos')->name('exibirProdutos')->middleware('Login');
Route::get('/produtos/delete/{id}', 'ProdutosController@destroy')->name('excluir.produto')->middleware('Login');
Route::get('/produtos/edit/{id}', 'ProdutosController@edit')->name('editar.produtos')->middleware('Login');
Route::post('/produtos/edit/{id}', 'ProdutosController@update')->name('atualizar.produtos')->middleware('Login');


Route::get('/', function () {
    return view('inicio');
})->name('comeco');
