<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galerias';

    protected $fillable = [
      'idMascota'
    ];

    public function images()
    {
        return $this->hasMany('App\Image', 'idGaleria', 'id');
    }
}
