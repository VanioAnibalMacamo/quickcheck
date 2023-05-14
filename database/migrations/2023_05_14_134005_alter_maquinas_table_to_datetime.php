<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('maquinas', function (Blueprint $table) {
            $table->dateTime('dataRegisto')->change();
        });
    }

    public function down()
    {
        Schema::table('maquinas', function (Blueprint $table) {
            $table->date('dataRegisto')->change();
        });
    }
};
