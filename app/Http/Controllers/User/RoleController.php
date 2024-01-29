<?php

namespace App\Http\Controllers\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreRoleRequest;
class RoleController extends Controller
{
    public function __construct(Role $role){
        $this->role =$role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $this->successResponse($this->role->all(),'All Roles',200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->except('permissions');
        $role = $this->role->create($data);
        $role->givePermissionTo($request->permissions);
        return $this->successMessage('Role Added Successfully',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse($this->role->find($id),'Get Role',200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator  =Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('roles')->ignore($id),
            ]
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(),'VALIDATION_FAILED',422);
        }
        $this->role->where('id',$id)->update($request->all());
        return $this->successMessage('Update Role Successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->role->where('id',$id)->delete();
        return $this->successMessage('Delete Role Successfully',200);
    }
}
