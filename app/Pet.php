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
        return $this->hasOne('App\Breed', 'id','idRaza');
    }

    public function location()
    {
      return $this->hasOne('App\Location', 'id', 'idLocalidad');
    }

    public function province()
    {
      return $this->hasOne('App\Province', 'id', 'idProvincia');
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

    public function favorites()
    {
        return $this->hasMany('App\Favorite', 'idMascota', 'id');
    }

    /**
    *   FILTROS
    */
    public function scopeName($query, $name)
    {
            $query->where('nombre', 'LIKE', "%$name%");
    }

    public function scopeSex($query, $chkSex, $sex)
    {
        if(isset($chkSex))
        {
            $query->where('sexo', '=', $sex);
        }
    }

    public function scopeBreed($query, $chkBreed, $breed)
    {
        if(isset($chkBreed))
        {
            $query->where('idRaza', '=', $breed);
        }
    }

    public function scopeLocalization($query, $chkProvince, $province, $location)
    {
        if(isset($chkProvince))
        {
            $query->where('idProvincia', '=', $province)
                    ->where('idLocalidad', '=', $location);
        }
    }
}
