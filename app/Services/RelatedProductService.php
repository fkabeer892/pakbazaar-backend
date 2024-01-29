<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\RelatedProduct;

class RelatedProductService extends Service{

    public function __construct(){
        parent::__construct(RelatedProduct::class);
    }

}
