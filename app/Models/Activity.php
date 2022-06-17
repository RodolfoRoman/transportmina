<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function budgets()
    {
        return $this->hasMany('App\Models\Budget');
    }

    public function inventorytransaction()
    {
        return $this->hasMany('App\Models\InventoryTransaction');
    }
}
