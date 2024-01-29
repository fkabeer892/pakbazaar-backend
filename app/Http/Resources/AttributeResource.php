<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class AttributeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function toArray($request)
    {

        return [
            'name' => $this->name,
            'attributeValue' => AttributeValueResource::collection($this->whenLoaded('attributeValue')),
            'categoryHasAttribute' => CategoryHasAttributeResource::collection($this->whenLoaded('categoryHasAttribute')),
            'productAttribute' => ProductAttributeResource::collection($this->whenLoaded('productAttribute')),

        ];
    }
}
