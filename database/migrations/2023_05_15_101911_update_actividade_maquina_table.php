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
        Schema::table('actividade_maquina', function (Blueprint $table) {
            $table->date('dataInicio')->nullable()->after('maquina_id');
            $table->date('dataFim')->nullable()->after('dataInicio');
            $table->string('numero_actividade')->after('dataFim');
        });
    }

    public function down()
    {
        Schema::table('actividade_maquina', function (Blueprint $table) {
            $table->dropColumn(['dataInicio', 'dataFim', 'numero_actividade']);
        });
    }
};
