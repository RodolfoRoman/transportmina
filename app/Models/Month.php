<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;
    public function years()
    {
        return $this->belongsTo('App\Models\Year');
        # code... 
    }

    public function budgets()
    {
        return $this->hasMany('App\Models\Budget');
    }

    public function payroll()
    {
        return $this->hasMany('App\Models\Payroll');
    }
}
