<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\CouponCode;

class CouponCodeService extends Service{

    public function __construct(){
        parent::__construct(CouponCode::class);
    }

}
