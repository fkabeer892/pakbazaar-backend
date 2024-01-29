<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ModelHasRoleService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\ModelHasRoleResource;
use App\Http\Requests\StoreModelHasRoleRequest;

class ModelHasRoleController extends Controller
{

    protected $modelHasRoleService;

    public function __construct(ModelHasRoleService $modelHasRoleService){
        $this->modelHasRoleService = $modelHasRoleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(\Illuminate\Http\Request $request)
    {
        try{
            return $this->successResponse(
                ModelHasRoleResource::collection($this->modelHasRoleService->fetch(false, [])),
                'All Model Has Roles',
                200
            );
        }
        catch (\Exception $ex){
            return $this->errorMessage($ex->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(StoreModelHasRoleRequest $request)
    {
        try {
            return $this->successResponse(
                $this->modelHasRoleService->store($request->all()),
                'Model Has Role Added Successfully',
                200
            );
        }
        catch (\Exception $ex){
            return $this->errorMessage($ex->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            return $this->successResponse(
                $this->modelHasRoleService->getRow($id, ["products"]),
                'Category Detail',
                200
            );
        }
        catch (\Exception $ex){
            return $this->errorMessage($ex->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(ModelHasRoleRequest $request, $id){
        try{
            return $this->successResponse(
                $this->modelHasRoleService->update($request->all(), $id),
                'Model Has Role Updated Successfully',
                200
            );
        }
        catch (\Exception $ex){
            return $this->errorMessage($ex->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            return $this->successResponse(
                $this->modelHasRoleService->delete($id),
                'Model Has Role Deleted Successfully',
                200
            );
        }
        catch (\Exception $ex){
            return $this->errorMessage($ex->getMessage(), 500);
        }
    }
}
