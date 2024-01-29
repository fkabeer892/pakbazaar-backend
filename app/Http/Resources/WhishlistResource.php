<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class WhishlistResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'category_id' => $this->category_id,
            'category' => CategoryResource::collection($this->whenLoaded('category')),
            'user' => UserResource::collection($this->whenLoaded('user')),

        ];
    }
}
