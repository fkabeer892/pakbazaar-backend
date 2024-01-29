<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponser;
class BaseRequest extends RequestAbstract
{
   use ApiResponser;
   
    protected function formatErrors(Validator $validator): JsonResponse
    {
        return $this->errorResponse($validator->errors(),'VALIDATION_FAILED',422);
    }
}
