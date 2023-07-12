<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('perguntas', function (Blueprint $table) {
            $table->string('prioridade')->default('baixa');
        });
    }

    public function down()
    {
        Schema::table('perguntas', function (Blueprint $table) {
            $table->dropColumn('prioridade');
        });
    }
};
