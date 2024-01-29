<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderItemService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\OrderItemResource;
use App\Http\Requests\StoreOrderItemRequest;

class OrderItemController extends Controller
{

    protected $orderItemService;

    public function __construct(OrderItemService $orderItemService){
        $this->orderItemService = $orderItemService;
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
                OrderItemResource::collection($this->orderItemService->fetch(false, [])),
                'All Order Items',
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
    public function store(StoreOrderItemRequest $request)
    {
        try {
            return $this->successResponse(
                $this->orderItemService->store($request->all()),
                'Order Item Added Successfully',
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
                $this->orderItemService->getRow($id, ["products"]),
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
    public function update(OrderItemRequest $request, $id){
        try{
            return $this->successResponse(
                $this->orderItemService->update($request->all(), $id),
                'Order Item Updated Successfully',
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
                $this->orderItemService->delete($id),
                'Order Item Deleted Successfully',
                200
            );
        }
        catch (\Exception $ex){
            return $this->errorMessage($ex->getMessage(), 500);
        }
    }
}
