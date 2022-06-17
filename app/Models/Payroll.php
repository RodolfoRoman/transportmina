<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;


    public function month()
    {
        return $this->belongsTo('App\Models\Month');
        
    }

    public function payrolldetail()
    {
        return $this->hasMany('App\Models\PayrollDetail');
    }
}
