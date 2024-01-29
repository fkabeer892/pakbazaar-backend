<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Membership;

class MembershipService extends Service{

    public function __construct(){
        parent::__construct(Membership::class);
    }

}
