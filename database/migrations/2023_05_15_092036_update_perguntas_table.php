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
        Schema::table('perguntas', function (Blueprint $table) {
            $table->dropColumn(['massa_maquina', 'motivo_permissao']);
            $table->text('descricao')->after('id');
        });
    }

    public function down()
    {
        Schema::table('perguntas', function (Blueprint $table) {
            $table->integer('massa_maquina');
            $table->string('motivo_permissao');
            $table->dropColumn('descricao');
        });
    }
};
