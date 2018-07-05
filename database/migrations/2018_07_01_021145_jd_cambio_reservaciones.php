<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdCambioReservaciones extends Migration
{

    public function up()
    {
        Schema::table('reservaciones', function (Blueprint $table) {
            $table->dropForeign('reservaciones_tipo_evento_foreign');
        });
		
		Schema::table('reservaciones', function (Blueprint $table) {
            $table->renameColumn('tipo_evento', 'evento_id');
			 
			$table->foreign('evento_id')->references('id')->on('eventos');
        });
    }

    public function down()
    {
        Schema::table('reservaciones', function (Blueprint $table) {
            $table->dropForeign(['evento_id']);
        });
		
		Schema::table('reservaciones', function (Blueprint $table) {
             $table->renameColumn('evento_id', 'tipo_evento');
			 
			 $table->foreign('tipo_evento')->references('id')->on('eventos');
        });
    }
}
