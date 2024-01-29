<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CartItemService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\CartItemResource;
use App\Http\Requests\StoreCartItemRequest;

class CartItemController extends Controller
{

    protected $cartItemService;

    public function __construct(CartItemService $cartItemService){
        $this->cartItemService = $cartItemService;
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
                CartItemResource::collection($this->cartItemService->fetch(false, [])),
                'All Cart Items',
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
    public function store(StoreCartItemRequest $request)
    {
        try {
            return $this->successResponse(
                $this->cartItemService->store($request->all()),
                'Cart Item Added Successfully',
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
                $this->cartItemService->getRow($id, ["products"]),
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
    public function update(CartItemRequest $request, $id){
        try{
            return $this->successResponse(
                $this->cartItemService->update($request->all(), $id),
                'Cart Item Updated Successfully',
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
                $this->cartItemService->delete($id),
                'Cart Item Deleted Successfully',
                200
            );
        }
        catch (\Exception $ex){
            return $this->errorMessage($ex->getMessage(), 500);
        }
    }
}
