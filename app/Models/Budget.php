<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    public function subcostcenter()
    {
        return $this->belongsTo('App\Models\SubCostcenter');
    }
    public function month()
    {
        return $this->belongsTo('App\Models\Month');
    }
    public function activity()
    {
        return $this->belongsTo('App\Models\Activity');
    }
    public function headquarter()
    {
        return $this->belongsTo('App\Models\Headquarter');
    }


}
