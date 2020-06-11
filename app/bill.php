<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    public function items()
    {
        return $this->hasMany(billitem::class);
    }
}
