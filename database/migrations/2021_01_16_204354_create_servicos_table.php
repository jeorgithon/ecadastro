<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('dataInicial');
            $table->date('dataFinal');
            $table->time('horaInicial');
            $table->time('horaFinal');
            $table->string('observacao')->nullable();
            $table->string('nota')->nullable();
            
            $table->bigInteger('guarnicao_id');
            $table->foreign('guarnicao_id')->references('id')->on('guarnicaos');
            
            $table->bigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
}
