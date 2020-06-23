<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    public function packages(){
        return $this->belongsToMany(Packages::class, 'package_details');
    }
}
