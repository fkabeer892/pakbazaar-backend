<?php

namespace App\Models;
use App\Model;

class Promotion extends Model{

    protected $fillable = [
        "purchased_product_id", "purchased_product_quantity", "gift_product_id", "gift_product_quantity", "start_date", "end_date"
    ];

    
    
    function product(){
        return $this->belongsTo( Product::class);
    }

    
}
