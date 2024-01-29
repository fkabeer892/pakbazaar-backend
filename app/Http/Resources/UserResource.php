<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class UserResource extends JsonResource
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
            'getJWTIdentifier' => GetJWTIdentifierResource::collection($this->whenLoaded('getJWTIdentifier')),
            'getJWTCustomClaims' => GetJWTCustomClaimResource::collection($this->whenLoaded('getJWTCustomClaims')),

        ];
    }
}
