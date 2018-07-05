<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdTablaBlogComments extends Migration
{
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->text('respuesta')->nullable();
            $table->date('fecha')->nullable();
            $table->boolean('aprobacion')->default(False)->nullable();
			$table->string('tipo')->nullable();
			$table->integer('comentario_padre')->default('0')->nullable();
			$table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
		Schema::table('blog_comments', function (Blueprint $table) {
			$table->dropForeign(['user_id']);
        });
		
        Schema::dropIfExists('blog_comments');
    }
}
