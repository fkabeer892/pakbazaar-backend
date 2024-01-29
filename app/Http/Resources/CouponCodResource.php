<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class CouponCodResource extends JsonResource
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
            'code' => $this->code,
            'use_limit' => $this->use_limit,
            'min_cart_amount' => $this->min_cart_amount,
            'discount_tye' => $this->discount_tye,
            'discount_amount' => $this->discount_amount,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'cart' => CartResource::collection($this->whenLoaded('cart')),
            'order' => OrderResource::collection($this->whenLoaded('order')),

        ];
    }
}
