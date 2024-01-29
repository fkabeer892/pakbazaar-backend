<?php

namespace App\Models;
use App\Model;

class ProductAttribute extends Model{

    protected $fillable = [
        "product_id", "attribute_id", "attribute_value_id", "value"
    ];

    
    
    function attributeValue(){
        return $this->belongsTo( AttributeValue::class);
    }

    
    function attribute(){
        return $this->belongsTo( Attribute::class);
    }

    
    function product(){
        return $this->belongsTo( Product::class);
    }

    
}
