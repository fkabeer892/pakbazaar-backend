<?php
namespace App\Services;
use App\Model;
use App\Service;
use App\Models\Category;

class CategoryService extends Service{

    public function __construct(){
        parent::__construct(Category::class);
    }

    public function store($data){
        $category =  parent::store($data);

        $attributes = @$data["attributes"];
        $attribute_ids = @$data["attribute_ids"];

        $this->associateAttributesById($attribute_ids, $category->id);
        $this->associateAttributesByName($attributes, $category->id);

    }

    public function update($data, $id)
    {
        parent::update($data, $id);

        $attributes = @$data["attributes"];
        $attribute_ids = @$data["attribute_ids"];

        $this->associateAttributesById($attribute_ids, $id);
        $this->associateAttributesByName($attributes, $id);

    }

    public function associateAttributesById($attribute_ids, $category_id){
        if(is_array($attribute_ids) && count($attribute_ids) > 0){
            foreach ($attribute_ids as $attribute_id){
                $attribute = \App\Models\Attribute::find($attribute_id);
                if(is_object($attribute)){
                    \App\Models\CategoryHasAttribute::create([
                        "attribute_id" => $attribute->id,
                        "category_id" => $category_id
                    ]);
                }
            }
        }
    }

    public function associateAttributesByName($attributes, $category_id){
        if(is_array($attributes) && count($attributes) > 0){
            foreach ($attributes as $attribute_name){
                $attribute = \App\Models\Attribute::where("name", $attribute_name)->first();
                if(!is_object($attribute)){
                    $attribute = \App\Models\Attribute::create([
                        "name" => $attribute_name
                    ]);
                }
                \App\Models\CategoryHasAttribute::create([
                    "attribute_id" => $attribute->id,
                    "category_id" => $category_id
                ]);
            }
        }
    }

}
