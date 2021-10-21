<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        session_start();
        return view('login');
    }

    public function logar(Request $request)
    {
        $email = $request->get('email');
        $senha = $request->get('senha');
        session_start();
        $user = new Usuario;

        //regras de validação
        $regras = [

            'email' => 'email',
            'senha' => 'required'
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'email.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',

        ];

        //se não passar no validate
        $request->validate($regras, $feedback);

        $usuario = $user->where('email', $email)->where('senha', $senha)->get()->first();




        if (isset($usuario->nome)) {

            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['id'] = $usuario->id;
            $_SESSION['tipo_usuario_id'] = $usuario->tipo_usuario_id;
            $_SESSION['empresa_id'] = $usuario->empresa_id;



            return view('inicioLogin');
        } else {
            $msg = 'E-mail Ou Senha Incorretos';
            return view('login', ['msg' => $msg]);
        }
    }

    public function Deslogar()
    {
        session_start();
        session_destroy();
        return redirect()->route('comeco');
    }
}
