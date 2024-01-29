<?php

namespace App\Models;
use App\Model;

class Order extends Model{

    protected $fillable = [
        "customer_id", "total", "payment_method_id", "coupon_code_id", "discount_type", "discount_amount", "tax", "grand_total", "cart_id"
    ];

    
    function orderItem(){
        return $this->hasMany( OrderItem::class);
    }

    
    function orderReview(){
        return $this->hasMany( OrderReview::class);
    }

    
    
    function cart(){
        return $this->belongsTo( Cart::class);
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
