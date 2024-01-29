<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class PermissionResource extends JsonResource
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
            'modelHasPermission' => ModelHasPermissionResource::collection($this->whenLoaded('modelHasPermission')),
            'roleHasPermission' => RoleHasPermissionResource::collection($this->whenLoaded('roleHasPermission')),
            'permission' => PermissionResource::collection($this->whenLoaded('permission')),

        ];
    }
}
