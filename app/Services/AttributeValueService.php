<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\AttributeValue;

class AttributeValueService extends Service{

    public function __construct(){
        parent::__construct(AttributeValue::class);
    }

}
