<?php

namespace App\Models;
use App\Model;

class CouponCode extends Model{

    protected $fillable = [
        "code", "use_limit", "min_cart_amount", "discount_tye", "discount_amount", "start_date", "end_date"
    ];

    
    function cart(){
        return $this->hasMany( Cart::class);
    }

    
    function order(){
        return $this->hasMany( Order::class);
    }

    
    
}
