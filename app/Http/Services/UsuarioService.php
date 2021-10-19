<?php

namespace App\Http\Services;

use App\Usuario;
    class UsuarioService{
        public function GetAll(){
            $usuarios= new Usuario;
            $result=$usuarios->query()
            ->select(
                'usuarios.id',
                'usuarios.nome as nome' ,
                'usuarios.email as email',
                'usuarios.senha as senha',
                'tp.tipo as tipo_usuario_id',
                'tp.id as tipo_id'
            )
            ->join('tipo_usuario as tp', 'usuarios.tipo_usuario_id' , '=' ,'tp.id')
            ->get();
                return $result;
        }
    }
