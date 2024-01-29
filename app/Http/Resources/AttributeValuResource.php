<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class AttributeValuResource extends JsonResource
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
            'productAttribut' => ProductAttributResource::collection($this->whenLoaded('productAttribut')),
            'attribut' => AttributResource::collection($this->whenLoaded('attribut')),

        ];
    }
}
