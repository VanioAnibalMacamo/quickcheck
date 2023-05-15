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
        Schema::table('actividades', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_actividade_id')->nullable();
            $table->foreign('tipo_actividade_id')->references('id')->on('tipo_actividades');
        });
    }

    public function down()
    {
        Schema::table('actividades', function (Blueprint $table) {
            $table->dropForeign(['tipo_actividade_id']);
            $table->dropColumn('tipo_actividade_id');
        });
    }
};
