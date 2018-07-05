<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdCambiosValoresDefault extends Migration
{
  
    public function up()
    {
        Schema::table('tipo_salones', function (Blueprint $table) {
			$table->integer('max_personas')->default('0')->change();
			$table->integer('max_mesas')->default('0')->change();
			$table->integer('max_sillas')->default('0')->change();
        });
    }

   
    public function down()
    {
        
    }
}
