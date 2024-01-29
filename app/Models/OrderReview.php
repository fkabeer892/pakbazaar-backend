<?php

namespace App\Models;
use App\Model;

class OrderReview extends Model{

    protected $fillable = [
        "order_id", "product_id", "points", "feedback"
    ];

    
    
    function order(){
        return $this->belongsTo( Order::class);
    }

    
    function product(){
        return $this->belongsTo( Product::class);
    }

    
}
