<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    use HasFactory;

    public function budgets()
    {
        return $this->hasMany('App\Models\Budget');
    }

    public function production()
    {
        return $this->hasMany('App\Models\Production');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
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
