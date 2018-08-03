<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdCracionTablaPago extends Migration
{
    public function up()
    {
        Schema::table('reservaciones', function (Blueprint $table) {
            $table->decimal('costo_total')->nullable()->default('0.00');
			$table->decimal('pago_total')->nullable()->default('0.00');
			$table->decimal('saldo')->nullable()->default('0.00');
        });
    }

    public function down()
    {
       Schema::table('reservaciones', function (Blueprint $table) {
            $table->dropColumn('costo_total');
            $table->dropColumn('pago_total');
            $table->dropColumn('saldo');
        });
    }
}
