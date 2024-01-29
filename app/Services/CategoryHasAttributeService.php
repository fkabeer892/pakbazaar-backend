<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\CategoryHasAttribute;

class CategoryHasAttributeService extends Service{

    public function __construct(){
        parent::__construct(CategoryHasAttribute::class);
    }

}
