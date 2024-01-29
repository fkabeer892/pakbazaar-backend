<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class ProductAttributeResource extends JsonResource
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
            'product_id' => $this->product_id,
            'attribute_id' => $this->attribute_id,
            'attribute_value_id' => $this->attribute_value_id,
            'value' => $this->value,
            'attributeValue' => AttributeValueResource::collection($this->whenLoaded('attributeValue')),
            'attribute' => AttributeResource::collection($this->whenLoaded('attribute')),
            'product' => ProductResource::collection($this->whenLoaded('product')),

        ];
    }
}
