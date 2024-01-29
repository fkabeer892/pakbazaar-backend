<?php 

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreCouponCodRequest extends BaseRequest
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
            "code" => "required|max:180|min:3",
            "use_limit" => "required",
            "min_cart_amount" => "required",
            "discount_tye" => "required",
            "discount_amount" => "required",
            "start_date" => "required",
            "end_date" => "required",
        ];
    }
}



