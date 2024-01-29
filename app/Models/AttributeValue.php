<?php

namespace App\Models;
use App\Model;

class AttributeValue extends Model{

    protected $fillable = [
        "attribute_id", "name"
    ];

    
    function productAttribute(){
        return $this->hasMany( ProductAttribute::class);
    }

    
    
    function attribute(){
        return $this->belongsTo( Attribute::class);
    }

    
}
