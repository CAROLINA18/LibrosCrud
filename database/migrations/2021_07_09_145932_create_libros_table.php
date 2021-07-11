<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->index('nombre');
            $table->text('resumen')->nullable();
            $table->integer('npagina')->nullable();
            $table->integer('edicion');
            $table->unsignedInteger('tipo_librof');
            $table->foreign('tipo_librof')->references('id')->on('tipo_libros');
            $table->string('autor');
            $table->integer('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
