<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'mensajes';

    protected $fillable = [
        'idMuro', 'idMascota', 'mensaje', 'urlVideo', 'urlImagen', 'privado'
    ];

    public function pet()
    {
        return $this->belongsTo('App\Pet', 'idMascota');
    }
}
