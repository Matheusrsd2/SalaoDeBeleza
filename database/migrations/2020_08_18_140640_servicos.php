<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Servicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_servico');
            $table->enum('status', ['Finalizado', 'A Fazer', 'Em Andamento', 'Cancelado'])->default('A Fazer');
            $table->integer('agendamentos_id')->unsigned();
            $table->foreign('agendamentos_id')->references('id')->on('agendamentos');
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
