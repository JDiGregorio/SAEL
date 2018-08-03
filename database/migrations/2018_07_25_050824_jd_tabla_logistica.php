<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdTablaLogistica extends Migration
{

    public function up()
    {	
		Schema::table('reservaciones', function (Blueprint $table) {
			$table->boolean('decision')->nullable()->default(False);
			$table->integer('cantidad_personas')->nullable()->default('0');
			$table->integer('cantidad_mesas')->nullable()->default('0');
			$table->integer('cantidad_sillas')->nullable()->default('0');
			$table->boolean('cafe')->nullable()->default(False);
			$table->boolean('audiovisual')->default('0')->nullable();
        });
    }

    public function down()
    {
		Schema::table('reservaciones', function (Blueprint $table) {
            $table->dropColumn('decision');
            $table->dropColumn('cantidad_personas');
            $table->dropColumn('cantidad_mesas');
            $table->dropColumn('cantidad_sillas');
            $table->dropColumn('cafe');
            $table->dropColumn('audiovisual');
        });
    }
}
