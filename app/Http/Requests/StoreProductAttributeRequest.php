<?php 

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreProductAttributeRequest extends BaseRequest
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
            "value" => "required|max:180|min:3",
            "attribute_value_id" => "required|exists:attribute_values,id",
            "attribute_id" => "required|exists:attributes,id",
            "product_id" => "required|exists:products,id",
        ];
    }
}



