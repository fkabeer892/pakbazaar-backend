<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BrandService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\BrandResource;
use App\Http\Requests\StoreBrandRequest;

class BrandController extends Controller
{

    protected $brandService;

    public function __construct(BrandService $brandService){
        $this->brandService = $brandService;
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
                BrandResource::collection($this->brandService->fetch(false, [])),
                'All Brands',
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
    public function store(StoreBrandRequest $request)
    {
        try {
            return $this->successResponse(
                $this->brandService->store($request->all()),
                'Brand Added Successfully',
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
                $this->brandService->getRow($id, ["products"]),
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
    public function update(BrandRequest $request, $id){
        try{
            return $this->successResponse(
                $this->brandService->update($request->all(), $id),
                'Brand Updated Successfully',
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
                $this->brandService->delete($id),
                'Brand Deleted Successfully',
                200
            );
        }
        catch (\Exception $ex){
            return $this->errorMessage($ex->getMessage(), 500);
        }
    }
}
