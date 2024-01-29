<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Admin;

class AdminService extends Service{

    public function __construct(){
        parent::__construct(Admin::class);
    }

}
