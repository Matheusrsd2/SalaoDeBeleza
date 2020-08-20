<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Agendamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->enum('status', ['novo', 'cancelado','concluido'])->default('novo');
            $table->string('nome_cliente');
            $table->string('servico');
            $table->date('data');
            $table->time('hora');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('users');
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
        //
    }
}
