<?php

namespace App\Models;
use App\Model;

class ProductStock extends Model{

    protected $fillable = [
        "location_id", "product_id", "stock", "price"
    ];

    
    
    function location(){
        return $this->belongsTo( Location::class);
    }

    
    function product(){
        return $this->belongsTo( Product::class);
    }

    
}
