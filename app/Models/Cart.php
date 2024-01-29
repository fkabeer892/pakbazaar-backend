<?php

namespace App\Models;
use App\Model;

class Cart extends Model{

    protected $fillable = [
        "customer_id", "total", "payment_method_id", "coupon_code_id", "discount_type", "discount_amount", "tax", "grand_total"
    ];

    
    function cartItem(){
        return $this->hasMany( CartItem::class);
    }

    
    function order(){
        return $this->hasMany( Order::class);
    }

    
    
    function couponCode(){
        return $this->belongsTo( CouponCode::class);
    }

    
    function user(){
        return $this->belongsTo( User::class);
    }

    
    function paymentMethod(){
        return $this->belongsTo( PaymentMethod::class);
    }

    
}
