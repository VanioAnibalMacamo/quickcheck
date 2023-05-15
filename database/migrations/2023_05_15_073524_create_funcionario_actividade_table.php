<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('funcionario_actividade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->unsignedBigInteger('actividade_id');
            $table->timestamps();
            
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('actividade_id')->references('id')->on('actividades');
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcionario_actividade');
    }
};
