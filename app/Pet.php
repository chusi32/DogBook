<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [
      'idUsuario', 'nombre', 'edad', 'idProvincia', 'idLocalidad', 'idRaza', 'idPedigree'
    ];

    public function breed()
    {
        return $this->hasOne('App\Breed', 'idRaza');
    }

    public function location()
    {
      return $this->hasOne('App\Location', 'idLocalidad');
    }

    public function province()
    {
      return $this->hasOne('App\Province', 'idProvincia');
    }

    public function pedigree()
    {
      return $this->hasOne('App\Pedigree', 'idPedigree');
    }
}
