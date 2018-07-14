<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdCambiosReservacion extends Migration
{

    public function up()
    {
        Schema::table('reservaciones', function (Blueprint $table) {
             $table->renameColumn('fecha', 'fecha_inicio')->nullable();
			 $table->date('fecha_final')->nullable();
			 $table->text('observacion_1')->nullable();
			 $table->text('observacion_2')->nullable();
        });
    }

    public function down()
    {
        Schema::table('reservaciones', function (Blueprint $table) {
             $table->renameColumn('fecha_inicio', 'fecha')->change();
			 $table->dropColumn('fecha_final');
			 $table->dropColumn('observacion_1');
			 $table->dropColumn('observacion_2');
        });
    }
}
