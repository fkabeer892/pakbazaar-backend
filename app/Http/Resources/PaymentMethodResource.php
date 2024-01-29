<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class PaymentMethodResource extends JsonResource
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
            'account_id' => $this->account_id,
            'key' => $this->key,
            'secret' => $this->secret,
            'is_active' => $this->is_active,
            'cart' => CartResource::collection($this->whenLoaded('cart')),
            'order' => OrderResource::collection($this->whenLoaded('order')),

        ];
    }
}
