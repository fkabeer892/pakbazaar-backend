<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Cart;

class CartService extends Service{

    public function __construct(){
        parent::__construct(Cart::class);
    }

}
