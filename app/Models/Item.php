<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    //Many(Item)-One(Employee)
    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }

    //Many(Item)-One(Category)
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    //Many(Item)-One(Storage)
    public function storages()
    {
        return $this->belongsTo(Storage::class);
    }
}
