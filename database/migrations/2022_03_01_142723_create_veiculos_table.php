<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('motorista_id')->unsigned();
            $table->string('marcaModelo');
            $table->string('tipoVeiculo');
            $table->string('especie');
            $table->string('categoria');
            $table->string('capacidade');
            $table->string('placa');
            $table->timestamps();

            $table->foreign('motorista_id')->references('id')->on('motoristas')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
