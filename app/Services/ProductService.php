<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Product;

class ProductService extends Service{

    public function __construct(){
        parent::__construct(Product::class);
    }

}
