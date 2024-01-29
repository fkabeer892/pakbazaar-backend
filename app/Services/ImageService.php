<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Image;

class ImageService extends Service{

    public function __construct(){
        parent::__construct(Image::class);
    }

}
