<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favoritos';

    protected $fillable = [
        'idMascota', 'idMascotaFavorito'
    ];

    /**
    *   RELACIONES
    */
    public function pet()
    {
        return $this->belongsTo('App\Pet', 'idMascotaFavorito', 'id');
    }
}
