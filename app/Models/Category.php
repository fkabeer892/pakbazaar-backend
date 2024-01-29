<?php

namespace App\Models;
use App\Model;

class Category extends Model{

    protected $fillable = [
        "name", "parent_id"
    ];

    
    function categoryHasAttribute(){
        return $this->hasMany( CategoryHasAttribute::class);
    }

    
    function product(){
        return $this->hasMany( Product::class);
    }

    
    function whishlist(){
        return $this->hasMany( Whishlist::class);
    }

    
    
    function category(){
        return $this->belongsTo( Category::class);
    }

    
}
