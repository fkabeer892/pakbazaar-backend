<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class ProductAttributResource extends JsonResource
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
            'attributeValu' => AttributeValuResource::collection($this->whenLoaded('attributeValu')),
            'attribut' => AttributResource::collection($this->whenLoaded('attribut')),
            'product' => ProductResource::collection($this->whenLoaded('product')),

        ];
    }
}
