<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdTablaEventosPag extends Migration
{
    public function up()
    {
        Schema::create('pag_eventos', function (Blueprint $table) {
            $table->increments('id');
			$table->string('titulo')->nullable();
			$table->date('fecha')->nullable();
			$table->string('descripcion')->nullable();
			$table->text('contenido')->nullable();
			$table->string('organizador')->nullable();
			$table->string('direccion')->nullable();
			$table->string('numero')->nullable();
			$table->string('correo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pag_eventos');
    }
}
