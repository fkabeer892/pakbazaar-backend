<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class RoleResource extends JsonResource
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
            'guard_name' => $this->guard_name,
            'modelHasRole' => ModelHasRoleResource::collection($this->whenLoaded('modelHasRole')),
            'roleHasPermission' => RoleHasPermissionResource::collection($this->whenLoaded('roleHasPermission')),
            'role' => RoleResource::collection($this->whenLoaded('role')),

        ];
    }
}
