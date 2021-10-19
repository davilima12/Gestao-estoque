<?php

namespace App\Http\Middleware;

use Closure;
use App\Usuario;
use App\Produto;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session_start();
        $usuario = new Usuario;
        $produtos = new Produto;
        if($_SESSION['tipo_usuario_id'] == 1 || $_SESSION['tipo_usuario_id'] == 2 ){
            return $next($request);
        }else{
            return redirect()->route('comeco');
        }

    }
}
