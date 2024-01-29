<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class OrderReviewResource extends JsonResource
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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'points' => $this->points,
            'feedback' => $this->feedback,
            'order' => OrderResource::collection($this->whenLoaded('order')),
            'product' => ProductResource::collection($this->whenLoaded('product')),

        ];
    }
}
