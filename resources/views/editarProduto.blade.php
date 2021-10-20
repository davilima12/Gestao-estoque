@extends('partials.basico')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Edição De Produtos</h1>
    </div>


<div class="cadastrar">
    {{isset($msg) != '' ? $msg : ''}}<br>
    <form action="{{route('editar.produtos',['id'=>$produtos->id])}}" method="POST">
        @csrf

        {{$errors->has('nome')?$errors->first('nome') : ''}}<br>

        <input type="text" name="nome" id="nome" value="{{$produtos->nome}}"><br>

        {{$errors->has('preco')? $errors->first('preco') :''}}<br>

        <input type="text" name="preco" id="preco" value="{{$produtos->preco}}"><br>

        {{$errors->has("quantidade") ? $errors->first('quantidade') : ''}}<br>

        <input type="text" name="quantidade" id="quantidade" value="{{$produtos->quantidade}}"><br>

        <button type="submit">Salvar</button>
    </form>
</div>
   </div>
    @endsection
