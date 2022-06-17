<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    use HasFactory;

    public function activity()
    {
        return $this->belongsTo('App\Models\Activity');
    }

    public function headquarter()
    {
        return $this->belongsTo('App\Models\Headquarter');
    }
    public function directory()
    {
        return $this->belongsTo('App\Models\Directory');
    }
    public function subcostcenter()
    {
        return $this->belongsTo('App\Models\SubCostCenter');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
