<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\PaymentMethod;

class PaymentMethodService extends Service{

    public function __construct(){
        parent::__construct(PaymentMethod::class);
    }

}
