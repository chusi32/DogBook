<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedigree extends Model
{
    protected $table = 'pedigrees';
    protected $fillable = ['nombrePadre', 'nombreMadre', 'detalles'];
}
