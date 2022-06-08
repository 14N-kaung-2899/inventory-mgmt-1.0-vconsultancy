<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    //One(Storages)-Many(Item)
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    //Many(Storage)-One(Office)
    public function storages()
    {
        return $this->belongsTo(Storage::class);
    }    
}
