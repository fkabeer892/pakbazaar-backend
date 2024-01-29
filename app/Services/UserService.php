<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\User;

class UserService extends Service{

    public function __construct(){
        parent::__construct(User::class);
    }

}
