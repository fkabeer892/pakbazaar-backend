<?php

namespace App\Models;
use App\Model;

class OrderItem extends Model{

    protected $fillable = [
        "order_id", "product_id", "product_name", "quantity", "price", "inline_total"
    ];

    
    
    function order(){
        return $this->belongsTo( Order::class);
    }

    
    function product(){
        return $this->belongsTo( Product::class);
    }

    
}
