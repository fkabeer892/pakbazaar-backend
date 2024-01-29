<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Brand;

class BrandService extends Service{

    public function __construct(){
        parent::__construct(Brand::class);
    }

}
