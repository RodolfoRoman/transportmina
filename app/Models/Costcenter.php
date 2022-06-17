<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costcenter extends Model
{
    use HasFactory;

    public function subcostcenter()
    {
        return $this->hasMany('App\Models\SubCostcenter');
    }
}
