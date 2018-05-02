<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoungeTable extends Migration
{

    public function up()
    {
        Schema::create('lounges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->string('ubication');
			$table->string('description');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lounges');
    }
}
