<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\OrderItem;

class OrderItemService extends Service{

    public function __construct(){
        parent::__construct(OrderItem::class);
    }

}
