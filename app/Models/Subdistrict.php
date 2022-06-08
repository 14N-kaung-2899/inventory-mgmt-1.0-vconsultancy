<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;

    //Many(Sub District)-One(District)
    public function districts()
    {
        return $this->belongsTo(District::class);
    }

    //One(SubDistrict)-Many(Location)
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    //One(Sub District)-Many(Emergency)
    public function emergencies()
    {
        return $this->hasMany(Emergency::class);
    }
    
    //One(Sub District)-Many(Employee)
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    //One(SubDistrict)-Many(Payroll)
    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
