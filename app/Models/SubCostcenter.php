<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCostcenter extends Model
{
    use HasFactory;

    public function costcenter()
    {
        return $this->belongsTo('App\Models\CostCenter');
        # code...
    }

    public function budgets()
    {
        return $this->hasMany('App\Models\Budget');
    }

    public function payrolldetail()
    {
        return $this->hasMany('App\Models\PayrollDetail');
    }

    public function inventorytransaction()
    {
        return $this->hasMany('App\Models\InventoryTransaction');
    }
}
