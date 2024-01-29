<?php 

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StorePromotionRequest extends BaseRequest
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
            "purchased_product_quantity" => "required",
            "gift_product_quantity" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "purchased_product_id" => "required|exists:products,id",
        ];
    }
}



