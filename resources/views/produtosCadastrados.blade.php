@extends('partials.basico')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Produtos Cadastrados</h1>
    </div>

    <div class="table-responsive">

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($produtos as $produto )
                    <tr>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->preco}}</td>
                        <td>{{$produto->quantidade}}</td>

                        <td ><button  class="editar"><a href="{{route('editar.produtos',['id'=>$produto])}}" style="text-decoration:none" >Editar</a></td>
                        <td><button  class="deletar"><a href="{{route('excluir.produto',['id'=>$produto])}}" style="text-decoration:none">Excluir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>

@include('partials.rodape')
@endsection

