<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Order;

class OrderService extends Service{

    public function __construct(){
        parent::__construct(Order::class);
    }

}
