@extends('partials.basico')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Edição De Usuario</h1>
    </div>



<div class="cadastrar">
    {{ isset($msg) && $msg != '' ? $msg : '' }}

<form action="{{route('atualizar.funcioanario',['id' =>$usuario->id])}}" method="post">
@csrf


{{$errors->has('nome')? $errors->first('nome') : ''}}

<input type="text" name="nome" id="nome" value="{{$usuario->nome}}"><br>

{{$errors->has('email') ? $errors->first('email') : ''}}

<input type="text" name="email" id="email" value="{{$usuario->email}}"><br>

{{$errors->has('senha')? $errors->first('senha') : ''}}

<input type="password" name="senha" id="senha" value="{{$usuario->senha}}"><br>

<button type="submit">Salvar</button>

</div>

@include('partials.rodape')

@endsection
