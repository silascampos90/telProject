<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('rg')->nullable();
            $table->string('cpf');
            $table->string('telefone');
            $table->unsignedBigInteger('usuario_cadastro');
            $table->unsignedBigInteger('usuario_update')->nullable();
            $table->string('local_nascimento');
            $table->date('data_nascimento');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('usuario_cadastro')->references('id')->on('users');
            $table->foreign('usuario_update')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
