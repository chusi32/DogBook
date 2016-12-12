<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'imagenes';

    protected $fillable = [
        'idGaleria', 'ruta', 'imagen', 'titulo'
    ];
}
