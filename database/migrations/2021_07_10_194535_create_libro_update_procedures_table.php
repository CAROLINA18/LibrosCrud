<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibroUpdateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `update_libros`;
        CREATE PROCEDURE `update_libros` (nombre varchar(255) , resumen text , npagina int , edicion int , tipo_librof int , autor varchar(255) , precio int, id_lib int)
        BEGIN
        update libros  set nombre = nombre ,resumen = resumen, npagina = npagina, edicion = edicion , tipo_librof = tipo_librof, autor = autor , precio = precio
        where id = id_lib ;
        END;";
        \DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
