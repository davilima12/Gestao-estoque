<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">

</head>
<body>

<div class="topo">
    <div class="menu">
        <ul>
            <li><a href="{{route('entrar')}}">Logar</a></li>
            <li><a href="{{route('comeco')}}">inicio</a></
        </ul>
    </div>
</div>

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Seja Bem-Vindo Ao Sistema De Gestão  </h1>
        <h1>Insira Os Dados Para Cadastrar Sua Conta</h1>
    </div>


    <div class="cadastrar">
        {{isset($msg) != '' ? $msg : ''}}<br>
        <form action="{{route('index')}}" method="post">
            @csrf
            {{$errors->has('nome') ? $errors->first('nome') : ''}}<br>

             <input type="text" name="nome" value="{{old('nome')}}" placeholder="nome"><br>

             {{$errors->has('email') ? $errors->first('email') : ''}}<br>

            <input type="text" name="email" value="{{old('email')}}" placeholder="E-mail@example.com"><br>

            {{$errors->has('senha') ? $errors->first('senha'): '' }}<br>

            <input type="password" name="senha" value="{{old('senha')}}" placeholder="*******"><br>

            <button type="submit">Criar Conta</button>
        </form>
    </div>
</div>


    @include('partials.rodape')
</body>
</html>
