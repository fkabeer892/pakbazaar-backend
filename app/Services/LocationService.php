<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Location;

class LocationService extends Service{

    public function __construct(){
        parent::__construct(Location::class);
    }

}
