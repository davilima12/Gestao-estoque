
@extends('partials.basico')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Cadastro De Produtos</h1>
    </div>

    <div class="cadastrar">
        <form action="{{route('cadastrarProdutos')}}" method="POST">
            @csrf
            {{$errors->has('nome')? $errors->first('nome') : ''}}<br>

            <input type="text" name="nome" value="{{old('nome')}}" placeholder="Nome Do Produto"><br>

            {{$errors->has('preco') ? $errors->first('preco') : ''}}<br>

            <input type="text" name="preco" value="{{old('preco')}}" placeholder="Preço Do Produto"><br>

            {{$errors->has('quantidade') ? $errors ->first('quantidade') : ''}}<br>

            <input type="text" name="quantidade" value="{{old('quantidade')}}" placeholder="Quantidade" ><br>

            <button type="submit">Cadastrar Produto</button>

            </form>
    </div>
</div>

@include('partials.rodape')
@endsection






