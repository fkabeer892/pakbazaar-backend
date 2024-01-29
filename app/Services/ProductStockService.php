<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\ProductStock;

class ProductStockService extends Service{

    public function __construct(){
        parent::__construct(ProductStock::class);
    }

}
