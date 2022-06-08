<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    //One(Office)-Many(Employee)
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    //One(Office)-Many(Storage)
    public function storages()
    {
        return $this->hasMany(Storage::class);
    }

    //Many(Office)-One(Location)
    public function locations()
    {
        return $this->belongsTo(Location::class);
    }
}
