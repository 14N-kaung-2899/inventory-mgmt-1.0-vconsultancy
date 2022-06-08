<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    
    //One(Location)-Many(Office)
    public function offices()
    {
        return $this->hsaMany(Office::class);
    }
    
    //Many(Office)-One(SubDistrict)
    public function subdistricts()
    {
        return $this->belongsTo(Subdistrict::class);
    }
}
