<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdAgregarCamposTipoSalones extends Migration
{

    public function up()
    {
        Schema::table('tipo_salones', function (Blueprint $table) {
            $table->boolean('audiovisual')->default('0')->nullable();
			$table->dropColumn('precio');
        });
		
		Schema::table('salones', function (Blueprint $table) {
			$table->dropColumn('Max_personas');
			$table->string('fotografia')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tipo_salones', function (Blueprint $table) {
            $table->dropColumn('audiovisual');
            $table->decimal('precio')->nullable();
        });
		
		Schema::table('salones', function (Blueprint $table) {
            $table->integer('Max_personas')->default('0')->nullable();
			$table->dropColumn('fotografia');
        });
    }
}
