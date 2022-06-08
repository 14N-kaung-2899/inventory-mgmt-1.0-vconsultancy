<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    //One(Country)-Many(City)
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
