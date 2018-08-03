<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificacionTablaMenu extends Migration
{
    public function up()
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->boolean('enabled')->default(True);
        });
		
		Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name')->nullable();
			$table->string('descripcion')->nullable();
			$table->timestamps();
        });
		
		Schema::table('reservaciones', function (Blueprint $table) {
           $table->integer('tipo_evento')->unsigned()->change();
		   $table->boolean('estado')->default(False)->change();
        });
		
		Schema::table('reservaciones', function (Blueprint $table) {		   
		   $table->foreign('tipo_evento')->references('id')->on('eventos');
        });
		
		
    }

    public function down()
    {
		Schema::table('reservaciones', function (Blueprint $table) {
           $table->dropForeign(['tipo_evento']);
        });
		
        Schema::table('menu_items', function (Blueprint $table) {
            $table->dropColumn('enabled');
        });
		
		Schema::drop('eventos');
    }
}
