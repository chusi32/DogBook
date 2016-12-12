<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [
      'idUsuario', 'nombre', 'edad', 'sexo', 'idProvincia', 'idLocalidad', 'idRaza', 'idPedigree',
      'idMuro'
    ];

    /**
    *   RELACIONES
    */
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
      return $this->hasOne('App\Pedigree', 'id', 'idPedigree');
    }

    public function wall()
    {
        return $this->hasOne('App\Wall', 'id', 'idMuro');
    }

    public function gallery()
    {
        return $this->hasOne('App\Gallery', 'idMascota', 'id');
    }

    /**
    *   FILTROS
    */
    public function scopeName($query, $name)
    {
        if(trim($name) != "")
        {
            $query->where('nombre', 'LIKE', "%$name%");
        }
    }
}
