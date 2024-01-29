<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function __construct(Permission $permission){
        $this->permissions = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->permissions->all(),'All Permissions',200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        return $this->successResponse($this->permissions->create($request->all()),'Permission Added Successfully',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse($this->permissions->find($id),'get Permission Successfully',200);
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
                Rule::unique('permissions')->ignore($id),
            ]
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(),'VALIDATION_FAILED',422);
        }
        $this->permissions->where('id',$id)->update($request->all());
        return $this->successMessage('Update User Successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permissions->where('id',$id)->delete();
        return $this->successMessage('Delete Permission Successfully',200);
    }
}
