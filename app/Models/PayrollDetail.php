<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollDetail extends Model
{
    use HasFactory;

    public function subcostcenter()
    {
        return $this->belongsTo('App\Models\SubCostcenter');
        
    }
    public function headquarter()
    {
        return $this->belongsTo('App\Models\Headquarter');
        
    }
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
        
    }

    public function payroll()
    {
        return $this->belongsTo('App\Models\Payroll');
        
    }

}
