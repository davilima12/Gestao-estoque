<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adionar_dados_tipo_usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuario')->insert([
            'tipo'=>'empresa',

        ]);

        DB::table('tipo_usuario')->insert([
            'tipo'=>'funcionario',
        ]);

    }
}
