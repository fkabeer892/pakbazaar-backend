<?php

namespace App\Models;
use App\Model;

class ModelHasRole extends Model{

    protected $fillable = [
        "role_id", "model_type", "model_id"
    ];

    
    
    function role(){
        return $this->belongsTo( Role::class);
    }

    
}
