<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdCreacionRelacionMm extends Migration
{
    
    public function up()
    {
		Schema::table('reservaciones', function (Blueprint $table){
            $table->integer('secuencia')->nullable();
            $table->string('nombre')->nullable();
        });
    }
	
    public function down()
    {
		Schema::table('reservaciones', function (Blueprint $table){
			$table->dropColumn('secuencia');
			$table->dropColumn('nombre');
        });
    }
}
