<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class RoleHasPermissionResource extends JsonResource
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
            'role_id' => $this->role_id,
            'permission' => PermissionResource::collection($this->whenLoaded('permission')),
            'role' => RoleResource::collection($this->whenLoaded('role')),

        ];
    }
}
