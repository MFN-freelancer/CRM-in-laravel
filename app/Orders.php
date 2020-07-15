<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    public function order_address(){
        return $this->belongsTo(Business::class, 'business_id');
    }
//    public function ordered_products(){
//        return $this->belongsToMany( Products::class, 'order_details');
//    }
}
