<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo('App\Models\ProductFamily');
    }
    public function directory()
    {
        return $this->belongsTo('App\Models\Directory');
    }
    public function headquarter()
    {
        return $this->belongsTo('App\Models\Headquarter');
    }

    public function sale()
    {
        return $this->hasMany('App\Models\Sale');
    }
}
