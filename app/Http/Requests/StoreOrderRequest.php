<?php 

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreOrderRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            "total" => "required|min:0",
            "discount_type" => "sometimes",
            "discount_amount" => "sometimes|min:0",
            "tax" => "sometimes|min:0",
            "grand_total" => "required|min:0",
            "cart_id" => "required|exists:carts,id",
            "coupon_code_id" => "required|exists:coupon_codes,id",
            "customer_id" => "required|exists:users,id",
            "payment_method_id" => "required|exists:payment_methods,id",
        ];
    }
}



