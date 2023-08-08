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
        Schema::table('atrasos', function (Blueprint $table) {
            //
            $table->foreignId('hora_entrada')
                ->references('id')
                ->on('horas_de_entradas')
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atrasos', function (Blueprint $table) {
            //
            $table->dropColumn('hora_entrada');
        });
    }
};
