<?php
namespace App\Repositories;
use Illuminate\Support\Collection;

use App\libros;
use DB;

//esta clase se usa para manejar todo el tema de  manejo de data de la aplicacion y no cargar ese tipo de operaciones
//en el controlador , cada metodo se encarga de hacer una funcion en especifico.

class LibroRepository{
    public function crear($libroData):void
    {
        //libros::with('tipo_libros')->create([ 'nombre' => $libroData['nombre'], 'resumen' => $libroData['resumen'], 'tipo_librof' => $libroData['tipo_libro'],'npagina' => $libroData['npagina'], 'edicion' => $libroData['edicion'] , 'autor' => $libroData['autor'], 'precio' => $libroData['precio']]);
          DB::select(
            'CALL create_libro(?,?,?,?,?,?,?)'
            , array($libroData['nombre'],$libroData['resumen'],$libroData['npagina'],$libroData['edicion'],$libroData['tipo_libro'],$libroData['autor'],$libroData['precio'])
         );
    }


    public  function editar($id):collection
    {
       //return libros::with('tipo_libros')->find($id);
         return $libro [] = collect(DB::select(
        'CALL edit_libros('.$id.')')
     );
    }


    public function actualizar($libroData, $id):void
    {
        //libros::find($id)->update([ 'nombre' => $libroData['nombre'], 'resumen' => $libroData['resumen'],'tipo_librof' => $libroData['tipo_libro'],'npagina' => $libroData['npagina'], 'edicion' => $libroData['edicion'] , 'autor' => $libroData['autor'], 'precio' => $libroData['precio']]);

        DB::select(
            'CALL update_libros(?,?,?,?,?,?,?,?)'
            , array($libroData['nombre'],$libroData['resumen'],$libroData['npagina'],$libroData['edicion'],$libroData['tipo_libro'],$libroData['autor'],$libroData['precio'],$id)
        );
    }

    public function eliminar($id):void
    {
        //libros::find($id)->delete();
        DB::select(
            'CALL delete_libros('.$id.')');
    }


}