
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão-EStoque</title>
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>

<body>

<div class="topo">
    <div class="menu">
        <ul>
            <li><a href="{{route('inicio')}}">Create Account</a></li>
            <li><a href="{{route('comeco')}}">inicio</a></li>
        </ul>
    </div>
</div>

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Seja Bem-Vindo Ao Sistema De Gestão </h1>
    </div>
    <div class="cadastrar">

        {{isset($msg) != '' ? $msg : ''}}<br>
        <form action="{{route('logar')}}" method="POST">
            @csrf
            {{$errors->has('email')?$errors->first('email'): ''}}<br>
            <input type="text" value="{{old('email')}}" name="email" placeholder="email"><br>
            {{$errors->has('senha') ? $errors->first('senha') : ''}}<br>
            <input type="password" {{old('senha')}} name="senha" placeholder="*********"><br>
            <button type="submit">Logar</button>
        </form>
    </div>
</div>

@include('partials.rodape')
</body>
</html>
