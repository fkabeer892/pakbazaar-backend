<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class ModelHasRoleResource extends JsonResource
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
            'role_id' => $this->role_id,
            'model_type' => $this->model_type,
            'model_id' => $this->model_id,
            'role' => RoleResource::collection($this->whenLoaded('role')),

        ];
    }
}
