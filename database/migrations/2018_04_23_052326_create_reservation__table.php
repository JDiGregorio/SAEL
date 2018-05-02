<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_scheduled');
			$table->time('entry_time');
			$table->time('departure_time');
			$table->decimal('initial_balance', 10, 2);
			$table->string('status');
			$table->integer('clients_id')->unsigned();
			$table->integer('employees_id')->unsigned();
			
			$table->foreign('clients_id')->references('id')->on('clients');
			$table->foreign('employees_id')->references('id')->on('employees');
        });
		
		// Relación M:M tabla lounges con reservations
		Schema::create('lounge_reservation', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('lounges_id')->unsigned();
			$table->integer('reservations_id')->unsigned();
			
			$table->foreign('lounges_id')->references('id')->on('lounges');
			$table->foreign('reservations_id')->references('id')->on('reservations');
		});
    }

    public function down()
    {	
		Schema::dropIfExists('lounge_reservation');
        Schema::dropIfExists('reservations');
    }
}
