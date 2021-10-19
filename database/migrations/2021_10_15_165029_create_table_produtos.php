<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('empresa_id');
            $table->text('nome');
            $table->text('preco');
            $table->integer('quantidade');
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->foreign('funcionario_id')->references('id')->on('tipo_usuario');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
        $table->dropForeign('produtos_empresa_id_foreign');
        $table->dropForeign('produtos_funcionario_id_foreign');
        });

        Schema::dropIfExists('produtos');
    }
}
