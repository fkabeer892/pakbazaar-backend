<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Attribute;

class AttributeService extends Service{

    public function __construct(){
        parent::__construct(Attribute::class);
    }

}
