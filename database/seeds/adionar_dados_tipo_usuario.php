<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\TipoUsuario;

class adionar_dados_tipo_usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoUsuario::create([
            'id' => TipoUsuario::TIPO_EMPRESA_ID,
            'tipo' => TipoUsuario::TIPO_EMPRESA,

        ]);

        TipoUsuario::create([
            'id' =>TipoUsuario::TIPO_FUNCIONARIO_ID,
            'tipo' => TipoUsuario::TIPO_FUNCIONARIO,
        ]);

    }
}
