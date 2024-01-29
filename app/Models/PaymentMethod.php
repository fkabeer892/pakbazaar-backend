<?php

namespace App\Models;
use App\Model;

class PaymentMethod extends Model{

    protected $fillable = [
        "name", "account_id", "key", "secret", "is_active"
    ];

    
    function cart(){
        return $this->hasMany( Cart::class);
    }

    
    function order(){
        return $this->hasMany( Order::class);
    }

    
    
}
