<?php


namespace App;

use Illuminate\Database\Eloquent\Model as CoreModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends CoreModel {

    use SoftDeletes;

}
