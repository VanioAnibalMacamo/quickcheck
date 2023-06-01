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
        Schema::create('tipo_atividade_pergunta', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_actividade_id');
            $table->unsignedBigInteger('pergunta_id');
            $table->timestamps();

            $table->foreign('tipo_actividade_id')->references('id')->on('tipo_actividades')->onDelete('cascade');
            $table->foreign('pergunta_id')->references('id')->on('perguntas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_atividade_pergunta');
    }
};
