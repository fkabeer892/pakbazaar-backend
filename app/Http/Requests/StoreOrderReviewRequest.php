<?php 

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreOrderReviewRequest extends BaseRequest
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
            "points" => "required",
            "feedback" => "sometimes",
            "order_id" => "sometimes|exists:orders,id",
            "product_id" => "sometimes|exists:products,id",
        ];
    }
}



