<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('remember_token', 100)->nullable();
            $table->string('cep');
            $table->string('cidade');
            $table->string('email');
            $table->string('nome');
            $table->string('endereco');
            $table->string('cpf');
            $table->string('nivel_de_acesso');
            $table->string('estado');
            $table->string('telefone');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
