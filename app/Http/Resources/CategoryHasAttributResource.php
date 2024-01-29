<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class CategoryHasAttributResource extends JsonResource
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
            'category_id' => $this->category_id,
            'attribute_id' => $this->attribute_id,
            'attribute' => AttributeResource::collection($this->whenLoaded('attribute')),
            'category' => CategoryResource::collection($this->whenLoaded('category')),

        ];
    }
}
