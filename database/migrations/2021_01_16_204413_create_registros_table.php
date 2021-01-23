<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('km');
            $table->boolean('comandante');
            $table->boolean('motorista');
            
            $table->bigInteger('militar_id');
            $table->foreign('militar_id')->references('id')->on('militars')->onDelete('cascade');
            
            $table->bigInteger('viatura_id');
            $table->foreign('viatura_id')->references('id')->on('viaturas')->onDelete('cascade');
            
            $table->bigInteger('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
