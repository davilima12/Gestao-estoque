<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\UsuarioService;


class UsuarioController extends Controller
{
        public function index(){

            $usuarioService = new UsuarioService();


         $usuarios = $usuarioService->GetAll();


            return view('exibirUsuario', ['usuarios'=>$usuarios]);
        }
}
