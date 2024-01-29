<?php

namespace App\Models;
use App\Model;

class FeatureProduct extends Model{

    protected $fillable = [
        "product_id"
    ];

    
    
    function product(){
        return $this->belongsTo( Product::class);
    }

    
}
