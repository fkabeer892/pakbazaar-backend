<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class ProductStockResource extends JsonResource
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
            'location_id' => $this->location_id,
            'product_id' => $this->product_id,
            'stock' => $this->stock,
            'price' => $this->price,
            'location' => LocationResource::collection($this->whenLoaded('location')),
            'product' => ProductResource::collection($this->whenLoaded('product')),

        ];
    }
}
