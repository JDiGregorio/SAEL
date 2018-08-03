<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdTablaPatrocinadores extends Migration
{
    public function up()
    {
        Schema::create('patrocinadores', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nombre')->nullable();
			$table->string('foto')->nullable();
            $table->timestamps();
        });
		
		//Relación M:M tabla pag_eventos con patrocinadores
		Schema::create('pag_evento_patrocinador', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('pag_evento_id')->unsigned()->nullable();
			$table->integer('patrocinador_id')->unsigned()->nullable();
			
			$table->foreign('pag_evento_id')->references('id')->on('pag_eventos');
			$table->foreign('patrocinador_id')->references('id')->on('patrocinadores');
		});
    }

    public function down()
    {
		Schema::drop('pag_evento_patrocinador');
        Schema::dropIfExists('patrocinadores');
    }
}
