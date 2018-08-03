<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdAñadirCampoReservacion extends Migration
{

    public function up()
    {
        Schema::table('reservaciones', function (Blueprint $table) {
			$table->boolean('varios_dias')->nullable()->default('0');
        });
    }

    public function down()
    {
        Schema::table('reservaciones', function (Blueprint $table) {
            $table->dropColumn('varios_dias');
        });
    }
}
