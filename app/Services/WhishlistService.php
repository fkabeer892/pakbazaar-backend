<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Whishlist;

class WhishlistService extends Service{

    public function __construct(){
        parent::__construct(Whishlist::class);
    }

}
