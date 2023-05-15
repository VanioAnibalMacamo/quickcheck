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
        Schema::create('actividade_maquina', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actividade_id');
            $table->unsignedBigInteger('maquina_id');
            $table->timestamps();
            
            $table->foreign('actividade_id')->references('id')->on('actividades');
            $table->foreign('maquina_id')->references('id')->on('maquinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividade_maquina');
    }
};
