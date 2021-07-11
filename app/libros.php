<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libros extends Model
{
    protected $fillable = ['id','nombre', 'tipo_librof','resumen', 'npagina','edicion','autor','precio'];

    public function tipo_libros()
    {
        return $this->hasMany(tipo_libro::class ,'id','tipo_libroff');
    }
}
