<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    //Many(City)-One(Country)
    public function countries()
    {
        return $this->belongsTo(Country::class);
    }

    //One(City)-Many(District)
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
