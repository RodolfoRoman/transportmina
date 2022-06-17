<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function measure()
    {
        return $this->belongsTo('App\Models\Measure');
        # code... 
    }
    public function productfamily()
    {
        return $this->belongsTo('App\Models\ProductFamily');
    }

    public function production()
    {
        return $this->hasMany('App\Models\Production');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function inventorytransaction()
    {
        return $this->hasMany('App\Models\InventoryTransaction');
    }
}
