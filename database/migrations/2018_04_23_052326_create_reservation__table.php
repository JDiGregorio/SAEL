<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
			$table->time('hora_inicio')->nullable();
			$table->time('hola_final')->nullable();
			$table->decimal('monto_adelanto',10,2)->nullable();
			$table->boolean('estado')->nullable();
			$table->integer('cliente_id')->unsigned()->nullable();
			$table->integer('usuario_id')->unsigned()->nullable();
			$table->integer('tipo')->nullable();
			$table->integer('tipo_evento')->nullable();
			$table->timestamps();
			
			$table->foreign('cliente_id')->references('id')->on('clientes');
			$table->foreign('usuario_id')->references('id')->on('users');
        });
		
		//Relación M:M tabla lounges con reservations
		Schema::create('reservacion_salon', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('salon_id')->unsigned()->nullable();
			$table->integer('reservacion_id')->unsigned()->nullable();
			
			$table->foreign('salon_id')->references('id')->on('salones')->onDelete('cascade');
			$table->foreign('reservacion_id')->references('id')->on('reservaciones')->onDelete('cascade');
		});
    }

    public function down()
    {	
		Schema::drop('reservacion_salon');
        Schema::drop('reservaciones');
    }
}
