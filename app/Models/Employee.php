<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function directory()
    {
        return $this->belongsTo('App\Models\Directorytipe');
        
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
