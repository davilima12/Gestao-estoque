<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->text('nome');
            $table->text('email')->nullable();
            $table->text('senha')->nullable();
            $table->integer('empresa_id')->nullable();
            $table->timestamps();

        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('tipo_usuario_id')->references('id')->on('tipo_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuario_tipo_usuario_id_foreign');
        });

        Schema::dropIfExists('usuarios');
    }
}
