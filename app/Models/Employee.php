<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    //One(Employee)-Many(Item)
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    //One(Employee)-Many(OfficeDoc)
    public function officedocs()
    {
        return $this->hasMany(Officedoc::class);
    }

    //One(Employee)-One(KPI)
    public function kpis()
    {
        return $this->hasOne(Kpi::class);
    }

    //One(Employee)-Many(Emergency)
    public function emergencies()
    {
        return $this->hasMany(Emergency::class);
    }

    //Many(Employee)-One(Sub District)
    public function Subdistricts()
    {
        return $this->belongsTo(Subdistrict::class);
    }

    //One(Employee)-One(Employment)
    public function Employments()
    {
        return $this->belongsTo(Employment::class);
    }

    //One(Employee)-One(Payroll)
    public function Payrolls()
    {
        return $this->belongsTo(Payroll::class);
    }

    //Many(Employee)-One(Role)
    public function Roles()
    {
        return $this->belongsTo(Role::class);
    }

    //Many(Employee)-One(Office)
    public function Offices()
    {
        return $this->belongsTo(Office::class);
    }
}
