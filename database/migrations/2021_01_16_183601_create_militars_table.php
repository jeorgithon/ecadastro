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
            $table->string('matricula')->unique();
            $table->string('postoGraduacao');
            $table->string('ome');
            $table->string('permissao');
            $table->string('email')->unique();

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
