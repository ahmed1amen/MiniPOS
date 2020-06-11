<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billitem extends Model
{

    protected $guarded = [];


    public function Bill()
    {
        return $this->belongsTo(bill::class);
    }



}
