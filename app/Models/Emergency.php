<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;

    //Many(Emergency)-One(Employee)
    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }

    //Many(Emergency)-One(Subdistrict)
    public function subdistricts()
    {
        return $this->belongsTo(Subdistrict::class);
    }
}
