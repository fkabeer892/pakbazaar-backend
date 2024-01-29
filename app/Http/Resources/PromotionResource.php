<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class PromotionResource extends JsonResource
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
            'purchased_product_id' => $this->purchased_product_id,
            'purchased_product_quantity' => $this->purchased_product_quantity,
            'gift_product_id' => $this->gift_product_id,
            'gift_product_quantity' => $this->gift_product_quantity,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'product' => ProductResource::collection($this->whenLoaded('product')),

        ];
    }
}
