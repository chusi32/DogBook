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
        return $this->hasMany('App\Message', 'idMuro');
    }
}
