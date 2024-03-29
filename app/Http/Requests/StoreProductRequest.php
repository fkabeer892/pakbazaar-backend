<?php 

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreProductRequest extends BaseRequest
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
            "name" => "required|max:180|min:3",
            "sku" => "required|max:180|min:3",
            "brand_id" => "required|exists:brands,id",
            "category_id" => "required|exists:categories,id",
        ];
    }
}



