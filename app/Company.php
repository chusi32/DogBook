<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'empresa';
    protected $fillable = [
        'nombre', 'textoCorto', 'descripcion', 'idProvincia', 'idLocalidad',
        'direccion', 'telefono', 'web', 'idTipoEmpresa', 'rutaImagen'
    ];

    public function location()
    {
      return $this->hasOne('App\Location', 'id', 'idLocalidad');
    }

    public function province()
    {
      return $this->hasOne('App\Province', 'id', 'idProvincia');
    }

    public function companyType()
    {
        return $this->hasOne('App\companyType', 'id', 'idTipoEmpresa');
    }
}
