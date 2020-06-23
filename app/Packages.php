<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    //
    public function products(){
        return $this->belongsToMany(Products::class, 'package_details');
    }
}
