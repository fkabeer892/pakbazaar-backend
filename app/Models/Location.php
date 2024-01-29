<?php

namespace App\Models;
use App\Model;

class Location extends Model{

    protected $fillable = [
        "name", "parent_id"
    ];

    
    function productStock(){
        return $this->hasMany( ProductStock::class);
    }

    
    function user(){
        return $this->hasMany( User::class);
    }

    
    
    function location(){
        return $this->belongsTo( Location::class);
    }

    
}
