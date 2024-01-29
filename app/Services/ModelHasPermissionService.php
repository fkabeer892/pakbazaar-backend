<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\ModelHasPermission;

class ModelHasPermissionService extends Service{

    public function __construct(){
        parent::__construct(ModelHasPermission::class);
    }

}
