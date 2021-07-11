<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TipoLibro extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = range(0,20);
        foreach ($arrays as $valor) {
          DB::table('tipo_libros')->insert([	            
              'nombre_tipo' => ('Tipo_Libro'.$valor),
              'descripcion' => ('Esta es la descripcion'.$valor),
          ]);
        }
    }
}
