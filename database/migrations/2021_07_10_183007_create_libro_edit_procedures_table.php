<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibroEditProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `edit_libros`;
        CREATE PROCEDURE `edit_libros` (IN id int)
        BEGIN
        SELECT * FROM libros as L inner join tipo_libros as T on L.tipo_librof = T.id WHERE L.id = id;
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
