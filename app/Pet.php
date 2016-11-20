<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Breed;

class Pet extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [];

    public function breed()
    {
        return $this->hasOne('Breed', 'IDRaza');
    }
}
