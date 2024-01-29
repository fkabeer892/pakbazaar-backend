<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class VerificationCodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function toArray($request)
    {

        return [
            'email' => $this->email,
            'code' => $this->code,
            'expiry' => $this->expiry,
            'status' => $this->status,

        ];
    }
}
