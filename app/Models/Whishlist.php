<?php

namespace App\Models;
use App\Model;

class Whishlist extends Model{

    protected $fillable = [
        "customer_id", "category_id"
    ];

    
    
    function category(){
        return $this->belongsTo( Category::class);
    }

    
    function user(){
        return $this->belongsTo( User::class);
    }

    
}
