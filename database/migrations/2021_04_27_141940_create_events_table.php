<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('motorista_id')->unsigned();
            $table->bigInteger('escola_id')->unsigned();
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('color',7);
            $table->longText('description')->nullable();
            $table->timestamps();
            
            $table->foreign('motorista_id')->references('id')->on('motoristas')
            ->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')
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
        Schema::dropIfExists('events');
    }
}
