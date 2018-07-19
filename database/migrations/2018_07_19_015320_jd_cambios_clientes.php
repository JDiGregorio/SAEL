<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdCambiosClientes extends Migration
{
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
			$table->string('empresa')->nullable();
			$table->string('detalles')->nullable();
        });
		
		Schema::create('departamentos', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombre')->nullable();
			$table->string('codigo')->nullable();
			$table->timestamps();
        });
		
		Schema::create('ciudades', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombre')->nullable();
			$table->string('codigo')->nullable();
			$table->integer('departamento_id')->nullable()->unsigned();
			$table->timestamps();
			
			$table->foreign('departamento_id')->references('id')->on('departamentos');
        });
		
		Schema::table('clientes', function (Blueprint $table) {
			$table->integer('departamento_id')->nullable()->unsigned();
			$table->integer('ciudad_id')->nullable()->unsigned();
        });
		
		Schema::table('clientes', function (Blueprint $table) {
			$table->foreign('departamento_id')->references('id')->on('departamentos');
			$table->foreign('ciudad_id')->references('id')->on('ciudades');
        });
		
    }

    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('empresa');
            $table->dropColumn('detalles');
        });
		
		Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
			$table->dropForeign(['ciudad_id']);
			$table->dropColumn('departamento_id');
            $table->dropColumn('ciudad_id');
        });
		
		Schema::table('ciudades', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
        });
		
		Schema::dropIfExists('ciudades');
		Schema::dropIfExists('departamentos');
    }
}
