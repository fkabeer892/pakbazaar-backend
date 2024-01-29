<?php

namespace App\Models;
use App\Model;

class CartItem extends Model{

    protected $fillable = [
        "cart_id", "product_id", "product_name", "quantity", "price", "inline_total"
    ];

    
    
    function cart(){
        return $this->belongsTo( Cart::class);
    }

    
    function product(){
        return $this->belongsTo( Product::class);
    }

    
}
