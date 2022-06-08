<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    //Many(District)-One(City)
    public function cities()
    {
        return $this->belongsTo(City::class);
    }

    //One(District)-Many(Sub District)
    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class);
    }
}
