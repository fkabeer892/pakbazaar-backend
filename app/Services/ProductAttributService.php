<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\ProductAttribut;

class ProductAttributService extends Service{

    public function __construct(){
        parent::__construct(ProductAttribut::class);
    }

}
