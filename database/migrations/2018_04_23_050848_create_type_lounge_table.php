<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeLoungeTable extends Migration
{
    public function up()
    {
        Schema::create('type_lounges', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('description');
			$table->decimal('price', 10, 2);
			$table->integer('max_people');
			$table->integer('max_tables');
			$table->integer('max_chairs');
			$table->integer('lounges_id')->unsigned();
			
			$table->foreign('lounges_id')->references('id')->on('lounges');
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_lounges');
    }
}
