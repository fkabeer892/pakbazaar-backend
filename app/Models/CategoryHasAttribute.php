<?php

namespace App\Models;
use App\Model;

class CategoryHasAttribute extends Model{

    protected $fillable = [
        "category_id", "attribute_id"
    ];

    
    
    function attribute(){
        return $this->belongsTo( Attribute::class);
    }

    
    function category(){
        return $this->belongsTo( Category::class);
    }

    
}
