<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class ProductResource extends JsonResource
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
            'sku' => $this->sku,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'cartItem' => CartItemResource::collection($this->whenLoaded('cartItem')),
            'featureProduct' => FeatureProductResource::collection($this->whenLoaded('featureProduct')),
            'orderItem' => OrderItemResource::collection($this->whenLoaded('orderItem')),
            'orderReview' => OrderReviewResource::collection($this->whenLoaded('orderReview')),
            'productAttribute' => ProductAttributeResource::collection($this->whenLoaded('productAttribute')),
            'productStock' => ProductStockResource::collection($this->whenLoaded('productStock')),
            'promotion' => PromotionResource::collection($this->whenLoaded('promotion')),
            'relatedProduct' => RelatedProductResource::collection($this->whenLoaded('relatedProduct')),
            'brand' => BrandResource::collection($this->whenLoaded('brand')),
            'category' => CategoryResource::collection($this->whenLoaded('category')),

        ];
    }
}
