<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class LocationResource extends JsonResource
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
            'productStock' => ProductStockResource::collection($this->whenLoaded('productStock')),
            'user' => UserResource::collection($this->whenLoaded('user')),
            'location' => LocationResource::collection($this->whenLoaded('location')),

        ];
    }
}
