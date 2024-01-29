<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\FeatureProduct;

class FeatureProductService extends Service{

    public function __construct(){
        parent::__construct(FeatureProduct::class);
    }

}
