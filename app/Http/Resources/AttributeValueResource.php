<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class AttributeValueResource extends JsonResource
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
            'attribute_id' => $this->attribute_id,
            'name' => $this->name,
            'productAttribute' => ProductAttributeResource::collection($this->whenLoaded('productAttribute')),
            'attribute' => AttributeResource::collection($this->whenLoaded('attribute')),

        ];
    }
}
