<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoungeTable extends Migration
{

    public function up()
    {
        Schema::create('salones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->string('ubicacion')->nullable();
			$table->integer('Max_personas')->nullable();
			$table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('salones');
    }
}
