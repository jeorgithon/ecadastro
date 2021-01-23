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
            $table->dateTime('dataHoraInicial');
            $table->dateTime('dataHoraFinal');
            $table->string('observacao')->nullable();
            $table->string('nota')->nullable();
            
            $table->bigInteger('guarnicao_id');
            $table->foreign('guarnicao_id')->references('id')->on('guarnicaos')->onDelete('cascade');
            
            $table->bigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');
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
