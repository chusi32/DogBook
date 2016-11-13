<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $table = 'razas';
    protected $fillable = ['nombreRaza'];
}
