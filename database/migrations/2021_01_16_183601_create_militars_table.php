<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilitarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('militars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomeCompleto');
            $table->string('nomeGuerra');
            $table->string('matricula');
            $table->string('postoGraduacao');
            $table->string('ome')->nullable();
            $table->string('permissao');
            $table->string('email');

            $table->bigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('militars');
    }
}
