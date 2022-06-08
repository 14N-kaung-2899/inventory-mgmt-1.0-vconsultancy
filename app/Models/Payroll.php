<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    //One(Employment)-One(Employee)
    public function employees()
    {
        return $this->hasOne(Employee::class);
    }

    //Many(Payroll)-One(SubDistrict)
    public function subdistricts()
    {
        return $this->belongsTo(Subdistrict::class);
    }
}
