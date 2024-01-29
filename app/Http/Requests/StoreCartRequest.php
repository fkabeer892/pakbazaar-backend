<?php 

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreCartRequest extends BaseRequest
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
            "total" => "sometimes|min:0",
            "discount_type" => "sometimes",
            "discount_amount" => "sometimes|min:0",
            "tax" => "sometimes|min:0",
            "grand_total" => "sometimes|min:0",
            "coupon_code_id" => "sometimes|exists:coupon_codes,id",
            "customer_id" => "sometimes|exists:users,id",
            "payment_method_id" => "sometimes|exists:payment_methods,id",
        ];
    }
}



