<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class MembershipResource extends JsonResource
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
            'name' => $this->name,
            'fee' => $this->fee,
            'duration_unit' => $this->duration_unit,
            'duration' => $this->duration,

        ];
    }
}
