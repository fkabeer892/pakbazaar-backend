<?php

namespace App\Models;
use App\Model;

class Attribute extends Model{

    protected $fillable = [
        "name"
    ];

    
    function attributeValue(){
        return $this->hasMany( AttributeValue::class);
    }

    
    function categoryHasAttribute(){
        return $this->hasMany( CategoryHasAttribute::class);
    }

    
    function productAttribute(){
        return $this->hasMany( ProductAttribute::class);
    }

    
    
}
