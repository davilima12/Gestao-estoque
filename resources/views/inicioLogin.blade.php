@extends('partials.basico')

@section('conteudo')


<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Sejam Bem-Vindos Ao Sistema De Gestão</h1>
    </div>
    <div>
        {{ isset($msg) && $msg != '' ? $msg : '' }}
    </div>

</div>

@include('partials.rodape')
@endsection




