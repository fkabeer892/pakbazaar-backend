<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class AttributResource extends JsonResource
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
            'attributeValu' => AttributeValuResource::collection($this->whenLoaded('attributeValu')),
            'categoryHasAttribut' => CategoryHasAttributResource::collection($this->whenLoaded('categoryHasAttribut')),
            'productAttribut' => ProductAttributResource::collection($this->whenLoaded('productAttribut')),

        ];
    }
}
