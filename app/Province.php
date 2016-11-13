<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provincias';

    protected $fillable = ['nombreProvincia'];
}
