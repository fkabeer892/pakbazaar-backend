<?php

namespace App\Models;
use App\Model;

class Permission extends Model{

    protected $fillable = [
        "name", "guard_name"
    ];

    
    function modelHasPermission(){
        return $this->hasMany( ModelHasPermission::class);
    }

    
    function roleHasPermission(){
        return $this->hasMany( RoleHasPermission::class);
    }

    
    
    function permission(){
        return $this->belongsTo( Permission::class);
    }

    
}
