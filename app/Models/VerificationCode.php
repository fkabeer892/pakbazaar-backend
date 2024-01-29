<?php

namespace App\Models;
use App\Model;

class VerificationCode extends Model{

    protected $fillable = [
        "email", "code", "expiry", "status"
    ];

    
    
}
