<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaturas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('placa');
            $table->string('patrimonio');
            $table->bigInteger('km');
            $table->string('tipo');
            $table->string('marca');
            $table->string('modelo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viaturas');
    }
}
