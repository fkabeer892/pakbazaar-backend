<?php

namespace App\Models;
use App\Model;

class Brand extends Model{

    protected $fillable = [
        "name"
    ];

    
    function product(){
        return $this->hasMany( Product::class);
    }

    
    
}
