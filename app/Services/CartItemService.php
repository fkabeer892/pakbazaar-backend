<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\CartItem;

class CartItemService extends Service{

    public function __construct(){
        parent::__construct(CartItem::class);
    }

}
