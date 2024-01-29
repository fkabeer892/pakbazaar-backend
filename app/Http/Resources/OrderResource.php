<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class OrderResource extends JsonResource
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
            'total' => $this->total,
            'payment_method_id' => $this->payment_method_id,
            'coupon_code_id' => $this->coupon_code_id,
            'discount_type' => $this->discount_type,
            'discount_amount' => $this->discount_amount,
            'tax' => $this->tax,
            'grand_total' => $this->grand_total,
            'cart_id' => $this->cart_id,
            'orderItem' => OrderItemResource::collection($this->whenLoaded('orderItem')),
            'orderReview' => OrderReviewResource::collection($this->whenLoaded('orderReview')),
            'cart' => CartResource::collection($this->whenLoaded('cart')),
            'couponCode' => CouponCodeResource::collection($this->whenLoaded('couponCode')),
            'user' => UserResource::collection($this->whenLoaded('user')),
            'paymentMethod' => PaymentMethodResource::collection($this->whenLoaded('paymentMethod')),

        ];
    }
}
