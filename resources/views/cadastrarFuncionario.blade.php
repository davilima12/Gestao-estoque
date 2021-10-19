
@extends('partials.basico')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Cadastro De Funcionario</h1>
    </div>

    <div class="cadastrar">

        {{isset($msg)!= '' ? $msg : ''}}<br>

        <form action="{{route('CadastrarFuncionario')}}" method="post">
            @csrf
            {{$errors->has('nome')? $errors->first('nome'):''}}<br>

             <input  type="text" name="nome" placeholder="nome"><br>

             {{$errors->has('email') ? $errors->first('email') : ''}}<br>

            <input  type="text" name="email" placeholder="E-mail@example.com"><br>

            {{$errors->has('senha')? $errors->first('senha') : ''}}<br>

            <input  type="text" name="senha" placeholder="********">

            <button type="submit">Cadastrar Funcionario</button>

        </form>

    </div>

</div>

@include('partials.rodape')
@endsection




