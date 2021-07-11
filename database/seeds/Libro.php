<?php

use Illuminate\Database\Seeder;

class Libro extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = range(1,5);
        foreach ($arrays as $valor) {
          DB::table('libros')->insert([	            
              'nombre' => ('nombre_libro'.$valor),
              'resumen' => ('Esta es el resumen'.$valor),
              'npagina' => ($valor + 10),
              'edicion' => ($valor + 1),
              'tipo_librof' => ($valor),
              'autor' => ('Esta es el autor'.$valor),
              'precio' => ($valor + 20000),
          ]);
        }
    }
}
