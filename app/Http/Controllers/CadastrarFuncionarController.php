<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Http\Services\UsuarioService;
use App\TipoUsuario;



class CadastrarFuncionarController extends Controller
{

    public function index(){

        return view('cadastrarFuncionario');
    }


    public function Cadastrar(Request $request){

        $usuario = new Usuario;

                     //regras de validação
                     $regras = [
                        'nome'=>'required',
                        'email' => 'email',
                        'senha' => 'required'
                    ];

                    //as mensagens de feedback de validação
                    $feedback = [
                        'email.email' => 'O campo usuário (e-mail) é obrigatório',
                        'senha.required' => 'O campo senha é obrigatório',
                        'nome.required'=>'O campo Nome E Obrigatorio'
                    ];

                    //se não passar no validate
                    $request->validate($regras, $feedback);
        $nomeRequest = $request->get('nome');
        $emailRequest = $request->get('email');

        if($usuario->nome == $nomeRequest){
            $msg = 'Esse Nome Já Enxiste';
            return view('cadastrarFuncionario',['msg'=>$msg]);

        }elseif($usuario->email == $emailRequest){
            $msg = 'Esse Email Já Enxiste ';
            return view('cadastrarFuncionario',['msg'=>$msg]);
        }else{
            if($_SESSION['tipo_usuario_id'] == 1){

                $usuario =new Usuario;

                    $usuario-> nome = $request->get('nome');
                    $usuario-> email = $request->get('email');
                    $usuario-> senha = $request->get('senha');
                    $usuario-> tipo_usuario_id = TipoUsuario::TIPO_FUNCIONARIO_ID;
                    $usuario-> empresa_id =($_SESSION['id']);

                    $usuario->save();

                    return redirect()->route('usuarios.visualizar');

                }else{
                    $msg = 'Somente Uma Empresa Pode Cadastrar Um Funcionario';
                    return view('cadastrarFuncionario',['msg'=>$msg]);
                }
        }



    }


    public function edit($id){

        $usuario =Usuario::findOrFail($id);
        return view('editarUsuario', ['usuario'=>$usuario]);
    }

    public function update(Request $request, $id){


        $usuario=Usuario::findOrFail($id);
        $User = new Usuario;


                          //regras de validação
                          $regras = [
                            'nome'=>'required',
                            'email' => 'email',
                            'senha' => 'required'
                        ];

                        //as mensagens de feedback de validação
                        $feedback = [
                            'email.email' => 'O campo usuário (e-mail) é obrigatório',
                            'senha.required' => 'O campo senha é obrigatório',
                            'nome.required'=>'O campo Nome E Obrigatorio'
                        ];

                        //se não passar no validate
                        $request->validate($regras, $feedback);



                    $nameRequest = $request->get('nome');
                    $emailRequest = $request->get('email');


                    if($usuario->nome == $nameRequest){

                        $msg ='Esse Nome Já Enxiste';
                        return view('editarUsuario',['usuario'=> $usuario , 'msg'=>$msg]);

                    }elseif($usuario->email == $emailRequest ){

                        $msg = 'Esse E-mail Já Enxiste';
                        return view('editarUsuario',['usuario'=> $usuario , 'msg'=>$msg]);
                    }else{
                        if( $_SESSION['tipo_usuario_id'] == 1 || $_SESSION['empresa_id'] == $usuario->empresa_id ){
                            $usuario->update([
                                'nome'=>$request->nome,
                                'email'=>$request->email,
                                'senha'=>$request->senha
                            ]);

                            return redirect()->route('usuarios.visualizar');
                        }else{
                            $msg = 'So Quem Pode Alterar Um Funcionario E O Proprio Funcionario Ou A Empresa';
                            return view('editarUsuario',['usuario'=> $usuario , 'msg'=>$msg]);
                        }

                    }



    }

    public function destroy($id){

       $session = $_SESSION["tipo_usuario_id"];

        if($session == 1 || $session <= 1 ){
            $usuarios = Usuario::findOrFail($id);
            $usuarios->delete();
            return redirect()->route('usuarios.visualizar');

        }else{

            return redirect()->route('usuarios.visualizar');
        }

    }
}
