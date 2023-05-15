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
            $table->dropColumn(['DataInicio', 'DataFim', 'numero_actividade']);
            $table->string('nome')->after('id');
            $table->text('descricao')->nullable()->after('nome');
        });
    }

    public function down()
    {
        Schema::table('actividades', function (Blueprint $table) {
            $table->date('DataInicio')->after('id');
            $table->date('DataFim')->after('DataInicio');
            $table->string('numero_actividade')->after('DataFim');
            $table->dropColumn(['nome', 'descricao']);
        });
    }
};
