<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class RolResource extends JsonResource
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
            'modelHasRol' => ModelHasRolResource::collection($this->whenLoaded('modelHasRol')),
            'roleHasPermission' => RoleHasPermissionResource::collection($this->whenLoaded('roleHasPermission')),
            'rol' => RolResource::collection($this->whenLoaded('rol')),

        ];
    }
}
