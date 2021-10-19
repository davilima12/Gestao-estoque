<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Usuario;
use App\Http\Services\ProdutoService;

class ProdutosController extends Controller
{
    public function index(){

        return view('CadastrarProdutos');
    }

    public function cadastrar(Request $request){


        $regras = [
            'nome'=> 'required',
            'preco'=> 'required|numeric|gt:0',
            'quantidade'=>'required|numeric|gt:0',
        ];

        $feedback = [
            'nome.required'=>'O campo Nome E Obrigatorio',
            'preco.required'=>'O campo Preço E Obrigatorio E Presisa Ser Um Número maior que 0',
            'quantidade.required'=>'O campo Quantidade E Obrigatorio',
            'preco.numeric'=>'O campo Preço Presisa Ser Um Número maior que 0',
            'quantidade.numeric'=>'O campo Quantidade Presisa Ser Um Número maior que 0'

        ];

        $request->validate($regras,$feedback);

        $produtos = new Produto;
        $usuarios = new Usuario;
        $produtos->nome = $request->get('nome');
        $produtos->preco = $request->get('preco');
        $produtos->quantidade =$request->get('quantidade');
        $produtos-> empresa_id = ($_SESSION['id']);
        $produtos->funcionario_id = ($_SESSION['tipo_usuario_id']);
        $produtos->save();

        $produtoService = new ProdutoService();
        $produtos = $produtoService->GetAll();

        return view('produtosCadastrados',['produtos'=>$produtos]);
    }

    public function exibirProdutos(){

            $produtoService = new ProdutoService();
            $produtos = $produtoService->GetAll();

        return view('produtosCadastrados',['produtos'=>$produtos]);
    }

    public function edit($id){
        $produtos = Produto::findOrFail($id);
        return view('editarProduto',['produtos'=>$produtos]);
    }

    public function update(Request $request, $id){

        $produtos=Produto::findOrFail($id);

        $regras = [
            'nome'=> 'required',
            'preco'=> 'required|numeric|gt:0',
            'quantidade'=>'required|numeric|gt:0',
        ];

        $feedback = [
            'nome.required'=>'O campo Nome E Obrigatorio',
            'preco.required'=>'O campo Preço E Obrigatorio E Presisa Ser Um Número maior que 0',
            'quantidade.required'=>'O campo Quantidade E Obrigatorio',
            'preco.numeric'=>'O campo Preço Presisa Ser Um Número maior que 0',
            'quantidade.numeric'=>'O campo Quantidade Presisa Ser Um Número maior que 0'

        ];



        $request->validate($regras,$feedback);

            if( $_SESSION['tipo_usuario_id'] == 1 || $_SESSION['empresa_id'] == $produtos->empresa_id ){

                    $produtos->update([
                    'nome'=>$request->nome,
                    'preco'=>$request->preco,
                    'quantidade'=>$request->quantidade
                ]);

                    return redirect()->route('exibirProdutos');
                }else{
                $msg = 'So Quem Pode Alterar Um Produto E O Proprio Funcionario Que Adicionou Ou A Empresa';
                 return view('editarProduto',['produtos'=> $produtos , 'msg'=>$msg]);
            }

        }

    public function destroy($id){



        $session = $_SESSION["tipo_usuario_id"];

         if($session == 1 || $session <= 1 ){
            $produtos = Produto::findOrFail($id);
            $produtos->delete();
            return redirect()->route('exibirProdutos');

         }else{

             return redirect()->route('exibirProdutos');
         }
    }

}
