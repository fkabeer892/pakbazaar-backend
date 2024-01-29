<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Promotion;

class PromotionService extends Service{

    public function __construct(){
        parent::__construct(Promotion::class);
    }

}
