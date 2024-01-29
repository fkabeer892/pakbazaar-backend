<?php

namespace App\Models;
use App\Model;

class RoleHasPermission extends Model{

    protected $fillable = [
        "permission_id", "role_id"
    ];

    
    
    function permission(){
        return $this->belongsTo( Permission::class);
    }

    
    function role(){
        return $this->belongsTo( Role::class);
    }

    
}
