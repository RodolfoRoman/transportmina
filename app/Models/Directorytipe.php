<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class directorytipe extends Model
{
    use HasFactory;

    //mi relacion con directorios
    public function directories()
    {
        return $this->hasMany('App\Models\Directory');
    }

}
