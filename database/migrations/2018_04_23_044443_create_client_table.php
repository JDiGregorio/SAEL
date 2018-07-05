<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identidad')->unique();
			$table->string('nombre');
			$table->mediumText('descripcion')->nullable();
			$table->string('direccion')->nullable();
			$table->integer('telefono')->nullable();
			$table->string('correo')->nullable();
			$table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('clientes');
    }
}
