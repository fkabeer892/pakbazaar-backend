<?php 

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StorePaymentMethodRequest extends BaseRequest
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
            "key" => "required|max:180|min:3",
            "secret" => "required|max:180|min:3",
            "is_active" => "required",
        ];
    }
}



