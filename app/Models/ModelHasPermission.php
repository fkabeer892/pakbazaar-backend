<?php

namespace App\Models;
use App\Model;

class ModelHasPermission extends Model{

    protected $fillable = [
        "permission_id", "model_type", "model_id"
    ];

    
    
    function permission(){
        return $this->belongsTo( Permission::class);
    }

    
}
