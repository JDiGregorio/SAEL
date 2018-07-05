<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeLoungeTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_salones', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('description');
			$table->decimal('precio', 10, 2)->default('0.00')->nullable();
			$table->integer('max_personas')->nullable();
			$table->integer('max_mesas')->nullable();
			$table->integer('max_sillas')->nullable();
			$table->integer('salon_id')->unsigned()->nullable();
			$table->timestamps();
			
			$table->foreign('salon_id')->references('id')->on('salones');
        });
    }

    public function down()
    {
        Schema::drop('tipo_salones');
    }
}
