<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JdTablaBlogPosts extends Migration
{
 
    public function up()
    {
		Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
		
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->date('fecha')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('contenido')->nullable();
            $table->boolean('estado')->default(False);
			$table->integer('categoria_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
			
			$table->foreign('categoria_id')->references('id')->on('categorias');
			$table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
		Schema::table('blog_posts', function (Blueprint $table) {
			$table->dropForeign(['categoria_id']);
			$table->dropForeign(['user_id']);
        });
		
		Schema::dropIfExists('categorias');
        Schema::dropIfExists('blog_posts');
    }
}
