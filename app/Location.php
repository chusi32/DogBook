<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'localidades';

    protected $fillable = ['idProvincia', 'idProvincia'];

    public static function locations($id){
        return Location::where('idProvincia', '=', $id)->get();
    }
}
