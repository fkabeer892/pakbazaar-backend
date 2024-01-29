<?php

namespace App\Models;
use App\Model;

class Role extends Model{

    protected $fillable = [
        "name", "guard_name"
    ];

    
    function modelHasRole(){
        return $this->hasMany( ModelHasRole::class);
    }

    
    function roleHasPermission(){
        return $this->hasMany( RoleHasPermission::class);
    }

    
    
    function role(){
        return $this->belongsTo( Role::class);
    }

    
}
