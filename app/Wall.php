<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wall extends Model
{
    protected $table = 'muros';

    protected $fillable = [
        'idMascota'
    ];

    public function messages()
    {
        return $this->hasMany('App\Message', 'idMuro')->orderBy('created_at', 'desc');
    }

    public function privateMessages()
    {
        return $this->hasMany('App\Message', 'idMuro')->where('privado', '=', 1)->orderBy('created_at', 'desc');
    }
}
