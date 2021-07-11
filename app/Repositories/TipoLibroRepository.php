<?php
namespace App\Repositories;

use App\tipo_libro;

//esta clase se usa para manejar todo el tema de  manejo de data de la aplicacion y no cargar ese tipo de operaciones
//en el controlador , cada metodo se encarga de hacer una funcion en especifico.

class TipoLibroRepository{
    public function crear($libroData):void
    {
        tipo_libro::create([ 'nombre_tipo' => $libroData['nombre_tipo'], 'descripcion' => $libroData['descripcion']]);

    }

    public  function editar($id):tipo_libro
    {
       return tipo_libro::find($id);
    }


    public function actualizar($libroData, $id):void
    {
        tipo_libro::find($id)->update([ 'nombre_tipo' => $libroData['nombre_tipo'], 'descripcion' => $libroData['descripcion']]);
    }

    public function eliminar($id):void
    {
        tipo_libro::find($id)->delete();
    }


}