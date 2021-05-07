<?php
namespace App\Repositories;

use App\Libro;

//esta clase se usa para manejar todo el tema de  manejo de data de la aplicacion y no cargar ese tipo de operaciones
//en el controlador , cada metodo se encarga de hacer una funcion en especifico.

class LibroRepository{
    public function crear($libroData):void
    {
        Libro::create ([ 'nombre' => $libroData['nombre'], 'resumen' => $libroData['resumen'],'npagina' => $libroData['npagina'], 'edicion' => $libroData['edicion'] , 'autor' => $libroData['autor'], 'precio' => $libroData['precio']]);

    }

    public  function editar($id):Libro
    {
       return Libro::find($id);
    }


    public function actualizar($libroData, $id):void
    {
       Libro::find($id)->update([ 'nombre' => $libroData['nombre'], 'resumen' => $libroData['resumen'],'npagina' => $libroData['npagina'], 'edicion' => $libroData['edicion'] , 'autor' => $libroData['autor'], 'precio' => $libroData['precio']]);
    }

    public function eliminar($id):void
    {
         Libro::find($id)->delete();
    }


}