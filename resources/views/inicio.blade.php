<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super-Gestão</title>
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>
<body>
    <div class="topo">
        <div class="menu">
            <ul>
                <li><a href="{{route('inicio')}}">Create Account</a></li>
                <li><a href="{{route('entrar')}}">Logar</a></li>
            </ul>
        </div>
    </div>

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Seja Bem-Vindo Ao Sistema De Gestão </h1>
        </div>

    </div>


@include('partials.rodape')
</body>
</html>


