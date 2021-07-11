<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibroCreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = 'DROP PROCEDURE IF EXISTS `create_libro`;
            CREATE PROCEDURE `create_libro` (nombre varchar(255) , resumen text , npagina int , edicion int , tipo_librof int , autor varchar(255) , precio int)
            BEGIN
            INSERT INTO libros(nombre, resumen, npagina, edicion , tipo_librof , autor , precio)
            VALUES (nombre, resumen, npagina, edicion , tipo_librof , autor , precio);
            END;';
  
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
