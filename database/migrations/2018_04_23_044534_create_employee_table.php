<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identidad',20)->unique();
			$table->string('name',100);
			$table->string('address',100)->nullable();
			$table->integer('phone_number')->nullable();
			$table->integer('cellular_number')->nullable();
			$table->string('mail',50)->nullable();
        });
    }
	
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
