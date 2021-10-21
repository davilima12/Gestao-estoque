<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Usuario;
use App\TipoUsuario;

class CreateAccount extends Controller
{
    public function criar()
    {
        session_start();
        return view('create');
    }
    public function index(Request $request)
    {

        //regras de validação
        $regras = [
            'nome' => 'required',
            'email' => 'email',
            'senha' => 'required'
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'email.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',
            'nome.required' => 'O campo Nome E Obrigatorio'
        ];

        //se não passar no validate
        $request->validate($regras, $feedback);




        $usuario = new Usuario;


        $nomeRequest = $request->get('nome');

        $emailRequest = $request->get('email');


        if (Usuario::where('nome', $nomeRequest)->first()) {
            $msg = 'Esse Nome Ja Enxiste No Nosso Banco De Dados';
            return view('create', ['msg' => $msg]);
        } elseif (Usuario::where('email', $emailRequest)->first()) {
            $msg = 'Esse Email Ja Enxiste No Nosso Banco De Dados';
            return view('create', ['msg' => $msg]);
        } else {
            $usuario->nome = $request->get('nome');
            $usuario->email = $request->get('email');
            $usuario->senha = $request->get('senha');
            $usuario->tipo_usuario_id = TipoUsuario::TIPO_EMPRESA_ID;
            $usuario->save();


            return view('login');
        }
    }
}
