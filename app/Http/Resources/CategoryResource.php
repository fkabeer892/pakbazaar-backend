<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class CategoryResource extends JsonResource
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
            'parent_id' => $this->parent_id,
            'categoryHasAttribute' => CategoryHasAttributeResource::collection($this->whenLoaded('categoryHasAttribute')),
            'product' => ProductResource::collection($this->whenLoaded('product')),
            'whishlist' => WhishlistResource::collection($this->whenLoaded('whishlist')),
            'category' => CategoryResource::collection($this->whenLoaded('category')),

        ];
    }
}
