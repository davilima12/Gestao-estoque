<?php

namespace App\Http\Services;

use App\Produto;

class ProdutoService{
    public function GetAll(){
        $produtos= new Produto;
        $result=$produtos->query()
        ->select(
            'produtos.id',
            'produtos.nome as nome' ,
            'produtos.preco as preco',
            'produtos.quantidade as quantidade',
            'produtos.funcionario_id as funcionario_id',
            'produtos.empresa_id as empresa_id'
        )
        ->get();
            return $result;

    }
}
