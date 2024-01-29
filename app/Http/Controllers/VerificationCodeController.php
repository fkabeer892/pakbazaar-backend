<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VerificationCodeService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\VerificationCodeResource;
use App\Http\Requests\StoreVerificationCodeRequest;

class VerificationCodeController extends Controller
{

    protected $verificationCodeService;

    public function __construct(VerificationCodeService $verificationCodeService){
        $this->verificationCodeService = $verificationCodeService;
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
                VerificationCodeResource::collection($this->verificationCodeService->fetch(false, [])),
                'All Verification Codes',
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
    public function store(StoreVerificationCodeRequest $request)
    {
        try {
            return $this->successResponse(
                $this->verificationCodeService->store($request->all()),
                'Verification Code Added Successfully',
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
                $this->verificationCodeService->getRow($id, ["products"]),
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
    public function update(VerificationCodeRequest $request, $id){
        try{
            return $this->successResponse(
                $this->verificationCodeService->update($request->all(), $id),
                'Verification Code Updated Successfully',
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
                $this->verificationCodeService->delete($id),
                'Verification Code Deleted Successfully',
                200
            );
        }
        catch (\Exception $ex){
            return $this->errorMessage($ex->getMessage(), 500);
        }
    }
}
