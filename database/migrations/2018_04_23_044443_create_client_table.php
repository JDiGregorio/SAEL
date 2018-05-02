<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identidad',20)->unique();
			$table->string('name',100);
			$table->mediumText('description');
			$table->string('address',100);
			$table->integer('phone_number');
			$table->integer('cellular_number')->nullable();
			$table->string('mail',50)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
