<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_libro extends Model
{
    protected $fillable = ['id','nombre_tipo', 'descripcion'];

}
