<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdAgregrarCamposEnReservacion extends Migration
{
    public function up()
    {
        Schema::table('reservaciones', function (Blueprint $table) {
            $table->string('titulo')->nullable();
            $table->string('color')->nullable();
        });
    }

    public function down()
    {
        Schema::table('reservaciones', function (Blueprint $table) {
            $table->dropColumn('titulo');
            $table->dropColumn('color');
        });
    }
}
