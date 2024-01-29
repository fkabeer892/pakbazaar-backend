<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\ModelHasRole;

class ModelHasRoleService extends Service{

    public function __construct(){
        parent::__construct(ModelHasRole::class);
    }

}
