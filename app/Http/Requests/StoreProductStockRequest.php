<?php 

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreProductStockRequest extends BaseRequest
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
            "stock" => "required",
            "price" => "required|min:0",
            "location_id" => "required|exists:locations,id",
            "product_id" => "required|exists:products,id",
        ];
    }
}



