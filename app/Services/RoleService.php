<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Role;

class RoleService extends Service{

    public function __construct(){
        parent::__construct(Role::class);
    }

}
