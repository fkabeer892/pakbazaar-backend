<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class OrderItemResource extends JsonResource
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
            'product_name' => $this->product_name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'inline_total' => $this->inline_total,
            'order' => OrderResource::collection($this->whenLoaded('order')),
            'product' => ProductResource::collection($this->whenLoaded('product')),

        ];
    }
}
