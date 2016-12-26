<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    protected $table = 'tiposEmpresas';
    protected $fillable = [
        'nombreTipo'
    ];
}
