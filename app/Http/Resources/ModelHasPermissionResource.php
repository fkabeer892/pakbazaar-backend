<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class ModelHasPermissionResource extends JsonResource
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
            'permission_id' => $this->permission_id,
            'model_type' => $this->model_type,
            'model_id' => $this->model_id,
            'permission' => PermissionResource::collection($this->whenLoaded('permission')),

        ];
    }
}
