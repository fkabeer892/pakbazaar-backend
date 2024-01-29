<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Permission;

class PermissionService extends Service{

    public function __construct(){
        parent::__construct(Permission::class);
    }

}
