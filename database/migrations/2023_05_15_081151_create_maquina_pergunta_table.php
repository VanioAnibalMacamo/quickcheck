<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquina_pergunta', function (Blueprint $table) {
            $table->unsignedBigInteger('maquina_id');
            $table->unsignedBigInteger('pergunta_id');
            $table->timestamps();

            $table->foreign('maquina_id')->references('id')->on('maquinas')->onDelete('cascade');
            $table->foreign('pergunta_id')->references('id')->on('perguntas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('maquina_pergunta');
    }
};
