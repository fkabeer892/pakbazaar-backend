<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class CartItemResource extends JsonResource
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
            'cart_id' => $this->cart_id,
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'inline_total' => $this->inline_total,
            'cart' => CartResource::collection($this->whenLoaded('cart')),
            'product' => ProductResource::collection($this->whenLoaded('product')),

        ];
    }
}
