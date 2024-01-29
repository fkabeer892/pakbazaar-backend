<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\OrderReview;

class OrderReviewService extends Service{

    public function __construct(){
        parent::__construct(OrderReview::class);
    }

}
