<?php

namespace App\Models;
use App\Model;

class Membership extends Model{

    protected $fillable = [
        "name", "fee", "duration_unit", "duration"
    ];

    
    
}
