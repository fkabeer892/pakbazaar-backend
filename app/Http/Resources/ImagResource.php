<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class ImagResource extends JsonResource
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
            'object_type' => $this->object_type,
            'object_id' => $this->object_id,

        ];
    }
}
