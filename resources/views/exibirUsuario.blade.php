@include('partials.basico')

@section('conteudo')


<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Funcionarios Cadastrados</h1>
    </div>

<div class="table-responsive">


    <table>
        <thead>
            <tr>
              <th>nome</th>
              <th>email</th>
              <th>Tipo Usuario</th>
            </tr>
         </thead>
         <tbody>
         @foreach ($usuarios as $usuario)
             <tr>
               <td>{{$usuario->nome}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->tipo_usuario_id}}</td>
                <td><button class="editar"><a href="{{route('editar.funcioanario',['id'=>$usuario->id])}}" title="Editar Funcionario {{ $usuario->nome}}" style="text-decoration:none">Editar</a></td>
                <td><button class="deletar"><a href="{{route('excluir.funcionario',['id'=>$usuario->id])}}" title="Excluir Usuario {{ $usuario->nome}}" style="text-decoration:none">Excluir</a></td>
            </tr>


         @endforeach
         </tbody>
     </table>
    </div>


</div>
@include('partials.rodape')


