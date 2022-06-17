<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    use HasFactory;

    //relacion con tipos de directorios

    public function directorytipe()
    {
        return $this->belongsTo('App\Models\Directorytipe');
        
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function employee()
    {
        return $this->hasMany('App\Models\Production');
    }

    public function inventorytransaction()
    {
        return $this->hasMany('App\Models\InventoryTransaction');
    }
}
